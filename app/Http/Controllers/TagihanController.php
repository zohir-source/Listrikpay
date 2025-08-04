<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Tarif;
use App\Models\Penggunaan;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TagihanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $tagihan = Tagihan::with(['pelanggan.tarif', 'penggunaan', 'pembayaran'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('pelanggan', function ($q) use ($search) {
                    $q->where('nama_pelanggan', 'like', "%$search%")
                      ->orWhere('nomor_kwh', 'like', "%$search%");
                })
                ->orWhere('bulan', 'like', "%$search%")
                ->orWhere('tahun', 'like', "%$search%");
            })
            ->orderByDesc('id_tagihan')
            ->paginate(10);

        return view('tagihan.index', compact('tagihan', 'search'));
        
       
    }

    public function tandaiLunas($id)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login dulu.');
    }

    $tagihan = Tagihan::findOrFail($id);
    $tagihan->status = 'Lunas';
    $tagihan->save();

    Pembayaran::create([
        'id_tagihan' => $tagihan->id_tagihan,
        'id_pelanggan' => $tagihan->id_pelanggan,
        'tanggal_pembayaran' => now(),
        'bulan_bayar' => $tagihan->bulan,
        'biaya_admin' => 2500,
        'total_bayar' => ($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) + 2500,
        'id_user' => Auth::user()->id_user, // ✅ nilainya null, bukan '-'
    ]);

    return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditandai lunas dan dicatat di pembayaran.');
}


}
