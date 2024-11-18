<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pengguna', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:user', // Pastikan username unik
            'password' => 'required|max:225', // Batas maksimum panjang password asli
            'role' => 'required',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password); // Simpan password yang di-hash
        $user->namakunci = $request->password; // Simpan password asli (untuk tampilan saja)
        $user->role = $request->role;

        // Simpan ke database
        $user->save();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function pajaktahunanlist()
    {
        // Ambil data dari tabel `aset`
        $users = DB::table('aset')->select('username', 'no_plat', 'tgl_pajaktahunan')->get();

        // Kirim data ke view
        return view('pajaktahunanlist', compact('users'));
    }

    public function pajak5tahunanlist()
    {
        // Ambil data dari tabel `aset`
        $users = DB::table('aset')->select('id', 'username', 'no_plat', 'tgl_pajak5tahunan')->get();
        // dd($users);
        // Kirim data ke view
        return view('pajak5tahunanlist', compact('users'));
    }
}
