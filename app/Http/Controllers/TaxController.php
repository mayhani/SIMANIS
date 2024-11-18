<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\UploadBukti;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaxController extends Controller
{
    // Menampilkan daftar pajak 5 tahunan
    public function pajak5tahunanlist()
    {
        $users = Aset::all(); // Pastikan menggunakan model Aset untuk mendapatkan instance model
        return view('pajak5tahunanlist', compact('users'));
    }


    // Menampilkan halaman upload bukti pembayaran
    public function showUploadBukti($id)
    {
        // Mengambil data pengguna (atau aset) berdasarkan id
        $user = Aset::find($id);

        // Memeriksa apakah data pengguna ditemukan
        if (!$user) {
            return redirect()->route('pajak5TahunanList')->with('error', 'Data tidak ditemukan.');
        }

        // Mengarahkan ke halaman upload.blade.php dengan data user
        return view('upload', compact('user'));
    }



    // Menyimpan bukti pembayaran yang diupload
    public function uploadBukti(
        Request $request,
        $id
    ) {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Simpan bukti pembayaran
        $filePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran');

        // Simpan informasi bukti pembayaran di database
        $uploadBukti = new UploadBukti();
        $uploadBukti->user_id = $id;
        $uploadBukti->file_path = $filePath;
        $uploadBukti->save();

        return redirect()->route('pajak5TahunanList')->with('success', 'Bukti pembayaran berhasil diupload!');
    }


    // Mengubah status pajak menjadi "Aktif" setelah bukti pembayaran diunggah
    public function ubahStatus($id)
    {
        $user = Aset::findOrFail($id); // Ambil data aset berdasarkan ID
        $user->status_pajak = 'aktif'; // Sesuaikan dengan kolom status pajak di database
        $user->save();

        return redirect()->route('pajak5tahunanlist')->with('status', 'Status pajak berhasil diubah.');
    }
}
