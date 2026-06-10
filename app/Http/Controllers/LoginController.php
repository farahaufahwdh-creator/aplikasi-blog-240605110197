<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index'); // Memanggil view login/index.blade.php
    }

    public function proses(Request $request)
    {
        // 1. Cari user berdasarkan username yang kamu ketik di form
        $user = \App\Models\User::where('user_name', $request->user_name)->first();

        // 2. Jika user ditemukan di database, langsung login-kan (bypass password)
        if ($user) {
            \Illuminate\Support\Facades\Auth::login($user);
            
            $request->session()->regenerate();
            
            // Menyimpan waktu login ke session sesuai modul
            $request->session()->put(
                'waktu_login',
                now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y HH:mm')
            );

            return redirect()->route('dashboard');
        }

        // Jika username tidak ada di database sama sekali
        return back()->withErrors([
            'gagal' => 'Username tidak ditemukan.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}