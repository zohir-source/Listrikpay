<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;
use App\Http\Controllers\Penggunaan;

class PenggunaanPelangganController extends Controller
{
    public function index()
{
    $pelanggan = Pelanggan::find(session('pelanggan')->id_pelanggan);

    

    if (!$pelanggan) {
        return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
    }

    $penggunaan = $pelanggan->penggunaan()->with('pelanggan')->get();

    return view('pelanggan.penggunaan.index', compact('penggunaan'));
}
}