@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #2196f3, #0d47a1);
        min-height: 100vh;
        font-family: 'Arial', sans-serif;
    }
    .v {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative; 
        left:-150px
    }
    .simpan {
        background-color: #22c55e; color: black; padding: 6px 140px; border: none; border-radius: 4px;
        font-family: 'inria Serif', serif;
        font-weight: bold;
    }
    .h2 {
        font-family: 'Linden Hill', serif; font-size: 40px;
    }
    .nama-pelanggan, .username , .password, .alamat, .tarif {  
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0.375rem;
        margin-bottom: 0.75rem;
        box-sizing: border-box;
        font-family: 'inria Serif', serif;
        padding-left: 15px;
    }
</style>

<div class="flex flex-col md:flex-row items-center justify-between px-10 py-16 text-white">
    <div class="bg-white rounded-xl p-8 w-full max-w-md shadow-lg text-black">
        <div class="flex items-center mb-4">
            <div class="text-yellow-500 text-3xl"><img src="/img/lightning.png" alt="logo" width="60%"></div>
            <h2 class="h2">Edit Pelanggan</h2>
        </div>

        <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" class="nama-pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>

            <input type="text" name="username" placeholder="Username" class="username" value="{{ old('username', $pelanggan->username) }}" required>

            <input type="password" name="password" placeholder="Biarkan kosong jika tidak ingin mengganti password" class="password">

            <input type="text" name="alamat" placeholder="Alamat" class="alamat" value="{{ old('alamat', $pelanggan->alamat) }}" required>

            <select name="id_tarif" class="tarif" required>
                <option value="">Tarif/KWH</option>
                @foreach($tarif as $t)
                    <option value="{{ $t->id_tarif }}" {{ $pelanggan->id_tarif == $t->id_tarif ? 'selected' : '' }}>
                        {{ $loop->iteration }} - {{ $t->daya }} VA - Rp{{ number_format($t->tarifperkwh, 0, ',', '.') }}/KWH
                    </option>
                @endforeach
            </select>

            <div style="text-align: center; margin-top: 10px;">
                <button type="submit" class="simpan">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <div class="v">
        <img src="/img/lightbulb.png" style="width: 90%; height: 90%;" alt="Lamp Icon">
        <p style="text-align : center ; margin-top:25px; font-size: 20px; font-family: 'inria serif', serif;">
            Bayar tagihan listrik jadi lebih cepat, <br>aman, dan transparan dengan ListrikPay
        </p>
    </div>
</div>
@endsection