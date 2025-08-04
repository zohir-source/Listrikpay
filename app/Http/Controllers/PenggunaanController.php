<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaan;
use App\Models\Pelanggan;
use App\Models\Tagihan;

class PenggunaanController extends Controller
{
    // Contoh di PenggunaanController.php

        public function index(Request $request)
{
    if (session()->has('pelanggan')) {
        $pelanggan = session('pelanggan');
        $penggunaan = Penggunaan::where('id_pelanggan', $pelanggan->id_pelanggan)->get();
        return view('pelanggan.penggunaan.index', compact('penggunaan')); // ← perhatikan ini
    }

    $search = $request->input('search');
    $penggunaan = Penggunaan::with('pelanggan')
        ->when($search, function ($query, $search) {
            $query->whereHas('pelanggan', function ($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%$search%")
                  ->orWhere('nomor_kwh', 'like', "%$search%");
            })
            ->orWhere('bulan', 'like', "%$search%")
            ->orWhere('tahun', 'like', "%$search%");
        })
        ->paginate(10)
        ->appends(['search' => $search]);

    return view('penggunaan.index', compact('penggunaan')); // ← perhatikan ini juga
}
  
    // PenggunaanController.php
    public function show($id)
    {
        $penggunaan = Penggunaan::with('pelanggan')->findOrFail($id);
        return view('penggunaan.show', compact('penggunaan'));
    }
    public function create()
    {
        return view('penggunaan.create');
    }
    public function store(Request $request)
    {
    $request->validate([
        'nomor_kwh' => 'required',
        'bulan' => 'required',
        'tahun' => 'required',
        'meter_awal' => 'required|numeric',
        'meter_akhir' => 'required|numeric|gte:meter_awal',
    ]);

    // Cari pelanggan berdasarkan nomor KWH
    $pelanggan = Pelanggan::with('tarif')->where('nomor_kwh', $request->nomor_kwh)->first();

    if (!$pelanggan) {
        return back()->with('error', 'Nomor KWH tidak ditemukan.');
    }

    // Hitung jumlah meter
    $jumlah_meter = $request->meter_akhir - $request->meter_awal;

    // Hitung total tagihan
    $tarifPerKwh = $pelanggan->tarif->tarif_per_kwh ?? 0;
    $totalTagihan = ($jumlah_meter * $tarifPerKwh) + 2500;

    // Simpan penggunaan
    $penggunaan = Penggunaan::create([
        'id_pelanggan' => $pelanggan->id_pelanggan,
        'bulan' => $request->bulan,
        'tahun' => $request->tahun,
        'meter_awal' => $request->meter_awal,
        'meter_akhir' => $request->meter_akhir,
    ]);

    // Simpan tagihan
    Tagihan::create([
        'id_penggunaan' => $penggunaan->id_penggunaan,
        'id_pelanggan' => $pelanggan->id_pelanggan,
        'bulan' => $request->bulan,
        'tahun' => $request->tahun,
        'jumlah_meter' => $jumlah_meter,
        'total_tagihan' => $totalTagihan,
        'status' => 'Belum Bayar',
    ]);

  
    return redirect()->route('penggunaan.index')->with('success', 'Penggunaan dan Tagihan berhasil disimpan.');

}
   public function destroy(Penggunaan $penggunaan)
{
    
    try {
        $penggunaan->delete();

        return redirect()->route('penggunaan.index')->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return back()->with('error', 'Data tidak bisa dihapus: ' . $e->getMessage());
    }
}

public function edit($id)
{
   

    $penggunaan = Penggunaan::findOrFail($id);

    $tagihan = \App\Models\Tagihan::where('id_penggunaan', $penggunaan->id_penggunaan)->first();

    if ($tagihan && strtolower($tagihan->status) === 'lunas') {
        return redirect()->route('penggunaan.index')->with('error', 'Data tidak dapat diedit karena tagihan sudah lunas.');
    }

    return view('penggunaan.update', compact('penggunaan'));

}

public function update(Request $request, $id)
{
    $request->validate([
        'bulan' => 'required',
        'tahun' => 'required',
        'meter_awal' => 'required|integer|min:0',
        'meter_akhir' => 'required|integer|min:' . $request->meter_awal,
    ]);

    $penggunaan = Penggunaan::findOrFail($id);

    // Cek apakah tagihan terkait sudah lunas
    $tagihan = Tagihan::where('id_penggunaan', $penggunaan->id_penggunaan)->first();

    if ($tagihan && strtolower($tagihan->status) === 'lunas') {
        return redirect()->back()->with('error', 'Penggunaan tidak dapat diubah karena tagihan sudah lunas.');
    }

    // Jika belum lunas, lanjutkan update
    $penggunaan->update([
        'bulan' => $request->bulan,
        'tahun' => $request->tahun,
        'meter_awal' => $request->meter_awal,
        'meter_akhir' => $request->meter_akhir,
    ]);

    // Update tagihan jika ada
    if ($tagihan) {
        $jumlah_meter = $request->meter_akhir - $request->meter_awal;
        $tagihan->jumlah_meter = $jumlah_meter;
        $tagihan->save();
    }

    return redirect()->route('penggunaan.index')->with('success', 'Data penggunaan berhasil diperbarui.');
}
}




