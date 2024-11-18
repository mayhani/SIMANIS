<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasUuids;

    // Tentukan nama tabel yang digunakan
    protected $table = 'user';

    protected $fillable = [
        'username',
        'password',
        'namakunci',
        'role', // tambahkan kolom lain sesuai kebutuhan
    ];

    protected $hidden = [
        'password', // hash password tidak ditampilkan
        'remember_token',
    ];
}
