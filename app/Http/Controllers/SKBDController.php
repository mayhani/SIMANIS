<?php

namespace App\Http\Controllers;

use App\Models\Aset; // Pastikan untuk menggunakan model Aset
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan untuk menggunakan model User

class SKBDController extends Controller
{
    public function storeAset(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'detail_motor' => 'required|string',
            'no_plat' => 'required|string',
            'tgl_pajaktahunan' => 'required|date',
            'tgl_pajak5tahunan' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('uploads', 'public');

        Aset::create([
            'username' => $request->username,
            'detail_motor' => $request->detail_motor,
            'no_plat' => $request->no_plat,
            'tgl_pajaktahunan' => $request->tgl_pajaktahunan,
            'tgl_pajak5tahunan' => $request->tgl_pajak5tahunan,
            'foto' => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Data aset berhasil disimpan.');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'pengguna', // Atur role sesuai kebutuhan
        ]);

        return redirect()->back()->with('success', 'Akun pengguna berhasil dibuat.');
    }
}
