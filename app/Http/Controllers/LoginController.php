<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Pastikan Anda mengimpor Hash jika menggunakan Hash::check
use App\Models\User; // Import model User

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Ambil data input username dan password
        $credentials = $request->only('username', 'password');

        // Cek apakah user ada di database
        $user = User::where('username', $credentials['username'])->first();

        // Jika user ditemukan, validasi password
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user); // login dengan user yang sudah terautentikasi

            // Arahkan ke dashboard sesuai dengan role
            switch ($user->role) {
                case 'superadmin':
                    return redirect()->route('dashsupadmin');
                case 'adminskbd':
                    return redirect()->route('dashskbd');
                case 'pengguna':
                    return redirect()->route('dashpengguna');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['loginError' => 'Role pengguna tidak dikenali.']);
            }
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['loginError' => 'Login gagal, cek username atau password.']);
    }
}
