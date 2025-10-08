<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Illuminate\Support\Facades\Session;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        // Ambil user yang baru login (setelah register)
        $user = $request->user();

        // Flash notifikasi sukses
        Session::flash('success', 'Akun berhasil dibuat! Selamat datang, ' . $user->name . ' 🎉');

        // Redirect sesuai role
        if ($user->role == 'admin') {
            return redirect()->intended('/admin/dashboard');
        }

        if ($user->role == 'user') {
            return redirect()->intended('/user-dashboard');
        }

        // Default jika tidak ada role (fallback)
        return redirect()->intended('/');
    }
}
