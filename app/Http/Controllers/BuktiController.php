<?php

// app/Http/Controllers/BuktiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UploadBukti;
use App\Models\User;

class BuktiController extends Controller
{
    public function uploadtahunan(Request $request, $username)
    {
        $request->validate([
            'bukti_pajak_tahunan' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        $user = User::where('username', $username)->first();

        $filePath = $request->file('bukti_pajak_tahunan')->store('bukti_pajak', 'public');

        UploadBukti::create([
            'user_id' => $user->id, // atau sesuaikan dengan kolom username
            'username' => $username, // atau sesuaikan dengan kolom username
            'jenis_pajak' => 'tahunan',
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Bukti pajak tahunan berhasil diunggah.');
    }

    public function upload5tahunan(Request $request, $username)
    {
        $request->validate([
            'bukti_pajak_5tahunan' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        $user = User::where('username', $username)->first();

        $filePath = $request->file('bukti_pajak_5tahunan')->store('bukti_pajak', 'public');

        UploadBukti::create([
            'user_id' => $user->id, // atau sesuaikan dengan kolom username
            'username' => $username, // atau sesuaikan dengan kolom username
            'jenis_pajak' => '5tahunan',
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Bukti pajak 5 tahunan berhasil diunggah.');
    }
}
