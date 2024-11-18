<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Aset; // Mengimpor model Aset
use App\Models\UploadBukti; // Mengimpor model UploadBukti
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MotorController extends Controller
{
    // Menampilkan dashboard pengguna
    public function dashpengguna()
    {
        // Mengambil data aset berdasarkan username pengguna yang sedang login
        $aset = Aset::where('username', Auth::user()->username)->first(); // Pastikan Aset diimport

        // Jika data aset tidak ditemukan, tampilkan pesan error
        if (!$aset) {
            return view('dashpengguna')->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Menghitung status pajak tahunan dan 5 tahunan
        $tglPajakTahunan = Carbon::parse($aset->tgl_pajaktahunan);
        $tglPajak5Tahunan = Carbon::parse($aset->tgl_pajak5tahunan);
        $today = Carbon::now();

        // Status pajak tahunan
        $statusPajakTahunan = [
            'expired' => $tglPajakTahunan->isPast(),
            'near_expiration' => $today->diffInMonths($tglPajakTahunan) < 3
        ];

        // Status pajak 5 tahunan
        $statusPajak5Tahunan = [
            'expired' => $tglPajak5Tahunan->isPast(),
            'near_expiration' => $today->diffInMonths($tglPajak5Tahunan) < 3
        ];

        // Mengembalikan tampilan dashboard pengguna dengan data status pajak
        return view('dashpengguna', compact('aset', 'statusPajakTahunan', 'statusPajak5Tahunan'));
    }
    public function dashsupadmin()
    {

        // Mengembalikan tampilan dashboard pengguna dengan data status pajak
        return view('dashsupadmin');
    }


    // Upload bukti pajak tahunan
    public function uploadPajakTahunan(Request $request, $user_id)
    {
        // Validasi file yang diunggah
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Memastikan user dengan ID tersebut ada di tabel 'user'
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Proses unggah file
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filePath = $file->store('uploads/pajak_tahunan', 'public');

            // Simpan informasi ke database
            UploadBukti::create([
                'id' => Str::uuid(),
                'user_id' => $user_id,
                'username' => Auth::user()->username,
                'jenis_pajak' => 'tahunan',
                'file_path' => $filePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            return redirect()->back()->with('success', 'Bukti pajak tahunan berhasil diunggah.');
        }

        return redirect()->back()->with(
            'error',
            'File tidak ditemukan.'
        );
    }



    // Upload bukti pajak 5 tahunan
    public function uploadPajak5Tahunan(Request $request, $user_id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $filePath = $request->file('bukti_pembayaran')->store('uploads/bukti_pajak_5_tahunan', 'public');

        UploadBukti::create([
            'id' => Str::uuid(),
            'user_id' => $user_id,
            'username' => Auth::user()->username,
            'jenis_pajak' => '5_tahunan',
            'file_path' => $filePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pajak5tahunanlist')->with('success', 'Bukti pajak 5 tahunan berhasil diunggah.');
    }

    // Menampilkan daftar bukti pajak tahunan
    public function pajaktahunanlist()
    {
        $pajakTahunan = UploadBukti::where('jenis_pajak', 'tahunan')->get();

        $aset = aset::all();


        return view('pajaktahunanlist', compact('pajakTahunan', 'aset'));
    }

    // Menampilkan daftar bukti pajak 5 tahunan
    public function pajak5tahunanlist()
    {
        $pajak5Tahunan = UploadBukti::where('jenis_pajak', '5_tahunan')->get();

        $aset = aset::all();

        return view('pajak5tahunanlist', compact('pajak5Tahunan', 'aset'));
    }
    public function index()
    {
        $aset = Aset::leftJoin('uploadbukti', 'aset.username', '=', 'uploadbukti.username')
            ->select('aset.*', 'uploadbukti.file_path')
            ->get();

        return view('nama_view', compact('aset'));
    }
}
