<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuktiController;
use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman login utama
Route::get('/login', function () {
    return view('login'); // Pastikan view 'login.blade.php' ada di folder resources/views
})->name('login');

// Rute untuk halaman login pengguna
Route::get('/loginpengguna', function () {
    return view('loginpengguna'); // Pastikan view 'loginpengguna.blade.php' ada di folder resources/views
})->name('loginpengguna');

// Rute untuk menangani login (sama untuk semua role)
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Rute untuk dashboard super admin (hanya bisa diakses jika login dan berperan sebagai superadmin)
Route::get(
    '/dashsupadmin',
    [MotorController::class, 'dashsupadmin']
)->name('dashsupadmin')->middleware('auth');

// Rute untuk dashboard admin SKBD (hanya bisa diakses jika login dan berperan sebagai adminskbd)
Route::get('/dashSKBD', [MotorController::class, 'dashSKBD'])->name('dashSKBD')->middleware('auth');

// Rute untuk dashboard pengguna
Route::get('/dashpengguna', [MotorController::class, 'dashpengguna'])->name('dashpengguna')->middleware('auth');

// Rute untuk profil pengguna
Route::get('/profil', [ProfileController::class, 'show'])->name('profil')->middleware('auth');

// Rute untuk daftar pengguna (admin SKBD)
Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
Route::post('/pengguna/store', [UserController::class, 'store'])->name('pengguna.store');

// Rute untuk upload bukti pajak tahunan dan 5 tahunan
Route::get('/ptahunan', function () {
    return view('Ptahunan');
})->name('ptahunan.form');

Route::post('/upload/ptahunan', [BuktiController::class, 'uploadPtahunan'])->name('uploadBuktiTahunan');
Route::post('/upload/p5tahunan', [BuktiController::class, 'uploadP5tahunan'])->name('uploadBukti5Tahunan');

// Rute untuk menampilkan bukti pajak tahunan dan 5 tahunan
Route::get('/Ptahunan', [BuktiController::class, 'showPtahunan'])->name('Ptahunan');
Route::get('/P5tahunan', [BuktiController::class, 'showP5tahunan'])->name('P5tahunan');

// Rute untuk daftar bukti pajak tahunan dan 5 tahunan
Route::match(['get', 'post'], '/pajak-tahunan-list', [MotorController::class, 'pajaktahunanlist'])->name('pajaktahunanlist');
Route::get('/pajak-5-tahunan-list', [MotorController::class, 'pajak5tahunanlist'])->name('pajak5tahunanlist');
Route::post('/pajaktahunanlist/{user_id}', [MotorController::class, 'uploadPajakTahunan'])->name('uploadPajakTahunan');


// Rute untuk upload bukti pajak tahunan dan 5 tahunan oleh pengguna
Route::post('upload-pajak-tahunan/{user_id}', [MotorController::class, 'uploadPajakTahunan'])->name('uploadPajakTahunan');
Route::post('upload-pajak-5-tahunan/{user_id}', [MotorController::class, 'uploadPajak5Tahunan'])->name('uploadPajak5Tahunan');

// Rute untuk upload bukti pajak oleh pengguna
Route::post('/upload-bukti/{id}', [TaxController::class, 'uploadBukti'])->name('uploadBukti');

// Rute untuk melihat upload bukti pajak
Route::get('/upload-bukti/{id}', [TaxController::class, 'showUploadBukti'])->name('showUploadBukti');

Route::post('/pajaktahunanlist/{user_id}', [BuktiController::class, 'uploadtahunan'])->name('uploadtahunan');
Route::post('/pajak5tahunanlist/{user_id}', [BuktiController::class, 'upload5tahunan'])->name('upload5tahunan');
