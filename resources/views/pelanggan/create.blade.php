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
        background-color: #22c55e; color: black; padding: 6px 140px; border: none; border-radius: 4px;font-family: 'inria Serif', serif;
        font-weight: bold;
    }
    .h2 {
        font-family: 'Linden Hill', serif;  font-size: 40px;
    }

    .nama-pelanggan, .username , .password, .alamat, .tarif {  
    width: 100%;              /* w-full */
    padding: 0.5rem;          /* p-2 (8px) */
    border: 1px solid #ccc;   /* border */
    border-radius: 0.375rem;  /* rounded (6px) */
    margin-bottom: 0.75rem;   /* mb-3 (12px) */
    box-sizing: border-box;   /* biar padding tidak melebihi lebar */
    font-family: 'inria Serif', serif;
    padding-left: 15px;
    }
</style>

<div class="flex flex-col md:flex-row items-center justify-between px-10 py-16 text-white">
    <!-- Form Tambah Pelanggan -->
    <div class="bg-white rounded-xl p-8 w-full max-w-md shadow-lg text-black">
        <div class="flex items-center mb-4">
            <div class="text-yellow-500 text-3xl"><img src="/img/lightning.png" alt="logo" width="60%"></div>
            <h2 class="h2">Tambah Pelanggan</h2>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pelanggan.store') }}" method="POST" style="margin: auto;">
            @csrf
            <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" class="nama-pelanggan" required>
            <input type="text" name="username" placeholder="Username" class="username" required>
            <input type="password" name="password" placeholder="Password" class="password" required> 

            <input type="text" name="alamat" placeholder="Alamat" class="alamat" required>

           <select name="id_tarif" class="tarif" required>
            <option value="">Tarif/KWH</option>
            @foreach($tarif as $t)
            <option value="{{ $t->id_tarif }}" {{ old('id_tarif') == $t->id_tarif ? 'selected' : '' }}>
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

    <!-- Samping: Deskripsi dan Tabel Tarif -->
    <div class="v">
        <img src="/img/lightbulb.png" style="width: 90%; height: 90%;"  alt="Lamp Icon">
        <p style="text-align : center ; margin-top:25px; font-size: 20px; font-family: 'inria serif', serif;">
            Bayar tagihan listrik jadi lebih cepat, <br>aman, dan transparan dengan ListrikPay
        </p>

        
    </div>
</div>
@endsection