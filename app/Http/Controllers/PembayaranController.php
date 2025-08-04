<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::with(['pelanggan', 'tagihan', 'user'])
            ->whereHas('tagihan', function ($q) {
                $q->where('status', 'Lunas');
            });
            
            if ($search = $request->search) {
            $query->whereHas('pelanggan', function ($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%$search%")
                  ->orWhere('nomor_kwh', 'like', "%$search%");
                })->orWhereHas('tagihan', function ($q) use ($search) {
                $q->where('bulan', 'like', "%$search%")
                  ->orWhere('tahun', 'like', "%$search%");
            });
        }
        
        $pembayaran = $query->orderByDesc('tanggal_pembayaran')->paginate(10);
        
        $pemabayaran = Pembayaran::with(['pelanggan', 'tagihan', 'user'])->get();
        
        return view('pembayaran.index', compact('pembayaran'));
            
    }
        public function laporan()
    {
        $pembayaran = Pembayaran::with('tagihan.pelanggan')->get();
        return view('laporan.pembayaran', compact('pembayaran'));
    }
}
