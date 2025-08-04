<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // 1. Coba login sebagai admin
        $user = User::where('username', $credentials['username'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect('/home'); // Admin masuk ke dashboard
    }

        // Cek ke tabel pelanggan (secara manual)
        $pelanggan = DB::table('pelanggan')->where('username', $request->input('username'))->first();

        if ($pelanggan && Hash::check($request->input('password'), $pelanggan->password)) {
            // Simpan ID pelanggan di session
            session(['id_pelanggan' => $pelanggan->id_pelanggan]);

            return redirect()->route('pelanggan.home');
    }

        // Jika gagal login
        return back()->withErrors(['login' => 'Username atau password salah.']);
    }


    public function logout()
    {
        Auth::logout(); // logout admin
        session()->flush(); // logout pelanggan
        return redirect('/login');
    }
}