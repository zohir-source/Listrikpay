<?php

namespace App\Http\Controllers;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\Penggunaan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pembayaran(Request $request)
{
    $search = $request->search;
    $pembayaran = Pembayaran::with(['tagihan.pelanggan', 'user'])
        ->when($search, function ($query, $search) {
            $query->whereHas('tagihan.pelanggan', function ($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('nomor_kwh', 'like', "%{$search}%");
            })
            ->orWhereHas('tagihan', function ($q) use ($search) {
                $q->where('bulan', 'like', "%{$search}%")
                  ->orWhere('tahun', 'like', "%{$search}%");
            });
        })
        ->paginate(10);

    return view('laporan.pembayaran', compact('pembayaran'));
}


public function cetakPembayaran(Request $request)
{
    $search = $request->input('search');

    $pembayaran = Pembayaran::with(['tagihan.pelanggan', 'user'])
        ->where(function ($query) use ($search) {
            $query->whereHas('tagihan.pelanggan', function ($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%$search%")
                  ->orWhere('nomor_kwh', 'like', "%$search%");
            })
            ->orWhereHas('tagihan', function ($q) use ($search) {
                $q->where('bulan', 'like', "%$search%")
                  ->orWhere('tahun', 'like', "%$search%");
            });
        })
        ->get();

    $pdf = PDF::loadView('laporan.cetak_pembayaran', compact('pembayaran'));
    return $pdf->stream('laporan_pembayaran.pdf');
}
 
public function tagihan()
    {
        $data = Tagihan::with('pelanggan')->whereDoesntHave('pembayaran')->get();
        return view('laporan.tagihan', compact('data'));
    }
    public function tagihanBelumLunas(Request $request)
{
    $search = $request->search;

    $tagihan = \App\Models\Tagihan::with(['pelanggan.tarif', 'pembayaran'])
        ->where('status', 'Belum Bayar')
        ->when($search, function ($query, $search) {
            $query->whereHas('pelanggan', function ($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('nomor_kwh', 'like', "%{$search}%");
            })
            ->orWhere('bulan', 'like', "%{$search}%")
            ->orWhere('tahun', 'like', "%{$search}%");
        })
        ->paginate(10);

    return view('laporan.belum_bayar', compact('tagihan'));
}

    public function cetakTagihanBelumLunas(Request $request)
{
    $search = $request->input('search');

    $tagihan = \App\Models\Tagihan::with(['pelanggan.tarif'])
        ->where('status', 'Belum Bayar')
        ->where(function ($query) use ($search) {
            $query->whereHas('pelanggan', function ($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%$search%")
                  ->orWhere('nomor_kwh', 'like', "%$search%");
            })
            ->orWhere('bulan', 'like', "%$search%")
            ->orWhere('tahun', 'like', "%$search%");
        })
        ->get();

    $pdf = PDF::loadView('laporan.cetak_belum_bayar', compact('tagihan'));
    return $pdf->stream('laporan_tagihan_belum_lunas.pdf');
}

/** 
    public function penggunaan()
    {
        $data = Penggunaan::with('pelanggan')->get();
        return view('laporan.penggunaan', compact('data'));
    }

    public function rekap()
    {
        $data = Pembayaran::selectRaw('MONTH(tanggal_pembayaran) as bulan, YEAR(tanggal_pembayaran) as tahun, SUM(total_bayar) as total')
            ->groupBy('bulan', 'tahun')
            ->get();
        return view('laporan.rekap', compact('data'));
    }

    public function admin()
    {
        $data = Pembayaran::with('user')->selectRaw('id_user, COUNT(*) as jumlah_transaksi, SUM(total_bayar) as total')
            ->groupBy('id_user')
            ->get();
        return view('laporan.admin', compact('data'));
    }

*/

}
