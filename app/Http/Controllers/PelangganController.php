<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $pelanggan = Pelanggan::with('tarif')
            ->when($keyword, function ($query, $keyword) {
                $query->where('nama_pelanggan', 'like', "%{$keyword}%")
                      ->orWhere('nomor_kwh', 'like', "%{$keyword}%");
            })
            ->get();

        return view('pelanggan.index', compact('pelanggan', 'keyword'));
    }

    public function create()
    {
        $tarif = Tarif::all(); // Kirim data tarif ke form
        return view('pelanggan.create', compact('tarif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pelanggan,username',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string',
            'id_tarif' => 'required|exists:tarif,id_tarif',
        ]);

        do {
            $nomor_kwh = mt_rand(1000000000, 9999999999);
        } while (Pelanggan::where('nomor_kwh', $nomor_kwh)->exists());

        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nomor_kwh' => $nomor_kwh,
            'alamat' => $request->alamat,
            'id_tarif' => $request->id_tarif,
        ]);

        return redirect()->route('pelanggan.create')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
    }
    // PelangganController.php
    public function searchKwh(Request $request)
    {
        $query = $request->get('query');
        $pelanggan = Pelanggan::where('no_kwh', 'LIKE', "%$query%")->get();

        return response()->json($pelanggan->map(function ($item) {
            return [
                'id_pelanggan' => $item->id,
                'no_kwh' => $item->no_kwh,
                'nama' => $item->nama_pelanggan,
            ];
        }));
    }
    public function dashboard()
    {
        return view('pelanggan.home');
    }

    public function show($id)
    {
        return redirect()->route('pelanggan.index');
    }

    public function edit($id)
{
    $pelanggan = Pelanggan::findOrFail($id);
    $tarif = Tarif::all();
    return view('pelanggan.update', compact('pelanggan', 'tarif'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_pelanggan' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'alamat' => 'required|string',
        'id_tarif' => 'required|exists:tarif,id_tarif',
    ]);

    $pelanggan = Pelanggan::findOrFail($id);
    $pelanggan->nama_pelanggan = $request->nama_pelanggan;
    $pelanggan->username = $request->username;
    $pelanggan->alamat = $request->alamat;
    $pelanggan->id_tarif = $request->id_tarif;

    if ($request->filled('password')) {
        $pelanggan->password = bcrypt($request->password);
    }

    $pelanggan->save();

    return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
}

}