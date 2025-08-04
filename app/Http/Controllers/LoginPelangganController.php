<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggan;

class LoginPelangganController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.pelangganlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pelanggan = Pelanggan::where('username', $request->username)->first();

        

        if ($pelanggan && Hash::check($request->password, $pelanggan->password)) {
            Session(['pelanggan' => $pelanggan]); // simpan objek pelanggan ke session

            return redirect()->route('pelanggan.home');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
{
    session()->forget('pelanggan'); // hapus session pelanggan
    session()->flush(); // opsional, hapus semua session

    return redirect()->route('pelanggan.login')->with('success', 'Anda telah logout.');
}
}