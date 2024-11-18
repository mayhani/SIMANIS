<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadBukti extends Model
{
    use HasFactory;
    use HasUuids;




    // Tentukan nama tabel jika berbeda dengan nama default model
    protected $table = 'uploadbukti';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id',
        'username',
        'user_id',
        'jenis_pajak',
        'file_path',
    ];
}
