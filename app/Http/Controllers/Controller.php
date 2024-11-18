<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function Ptahunan(Request $request)
    {
        // Validasi file yang di-upload
        $request->validate([
            'bukti_pajak_tahunan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bukti_pajak_5_tahunan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Menyimpan file bukti pajak tahunan
        $buktiPajakTahunanPath = $request->file('bukti_pajak_tahunan')->store('bukti_pajak_tahunan', 'public');

        // Menyimpan file bukti pajak 5 tahunan
        $buktiPajak5TahunanPath = $request->file('bukti_pajak_5_tahunan')->store('bukti_pajak_5_tahunan', 'public');

        // Menyimpan data bukti ke database
        UploadBukti::create([
            'user_id' => auth()->id(), // ID pengguna yang meng-upload
            'bukti_pajak_tahunan' => $buktiPajakTahunanPath,
            'bukti_pajak_5_tahunan' => $buktiPajak5TahunanPath,
        ]);

        // Mengambil data bukti yang sudah diupload
        $uploads = UploadBukti::where('user_id', auth()->id())->get();

        return view('Ptahunan', compact('uploads'));
    }
}
