<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Pastikan Str diimpor

class Aset extends Model
{
    protected $table = 'aset'; // Nama tabel, jika berbeda dengan nama model
    protected $fillable = ['username', 'tgl_pajaktahunan', 'tgl_pajak5tahunan', 'no_plat', 'foto']; // Kolom yang dapat diisi

    // Jika Anda ingin otomatis mengisi UUID saat membuat data
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid(); // Menghasilkan UUID saat membuat data baru
            }
        });
    }
}
