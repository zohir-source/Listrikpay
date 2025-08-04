<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;
use App\Models\User;

class TagihanPelangganController extends Controller
{
    public function index()
{
    $pelanggan = session('pelanggan');
    if (!$pelanggan) {
        return redirect()->route('login.pelanggan')->with('error', 'Silakan login sebagai pelanggan.');
    }

    $id_pelanggan = $pelanggan->id_pelanggan;

    $tagihan = Tagihan::with('penggunaan')
                ->whereHas('penggunaan', function($query) use ($id_pelanggan) {
                    $query->where('id_pelanggan', $id_pelanggan);
                })
                ->get();

    return view('pelanggan.tagihan.index', compact('tagihan'));
}




public function bayar($id)
{
    $tagihan = Tagihan::with('pelanggan.tarif')->findOrFail($id);

    $tarifPerKwh = $tagihan->pelanggan->tarif->tarifperkwh ?? 0;
    $jumlahMeter = $tagihan->jumlah_meter;

    $totalBayar = ($jumlahMeter * $tarifPerKwh) + 2500;

    // Ubah status jadi Lunas
    $tagihan->status = 'Lunas';
    $tagihan->save();

    $idUser = null;

// Jika user login sebagai admin, isi id_user
if (Auth::check() && Auth::user()->level === 'Admin') {
    $idUser = Auth::user()->id_user;
}

Pembayaran::create([
    'id_tagihan'         => $tagihan->id_tagihan,
    'id_pelanggan'       => $tagihan->id_pelanggan,
    'tanggal_pembayaran' => now(),
    'bulan_bayar'        => $tagihan->bulan,
    'biaya_admin'        => 2500,
    'total_bayar'        => $totalBayar,
    'id_user'            => $idUser, // akan null jika pelanggan, terisi jika admin
]);

    return redirect()->back()->with('success', 'Pembayaran berhasil.');
}
}