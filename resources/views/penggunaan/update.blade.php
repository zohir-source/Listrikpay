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
        left: -150px;
    }
    .simpan {
        background-color: #22c55e;
        color: black;
        padding: 6px 140px;
        border: none;
        border-radius: 4px;
        font-family: 'inria Serif', serif;
        font-weight: bold;
    }
    .h2 {
        font-family: 'Linden Hill', serif;
        font-size: 40px;
    }
    .form-input {
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
    <div class="bg-white rounded-xl p-8 w-full max-w-md shadow-lg text-black" style="position: relative;">
        <div class="flex items-center mb-4">
            <div class="text-yellow-500 text-3xl">
                <img src="/img/lightning.png" alt="logo" width="60%">
            </div>
            <h2 class="h2">Edit Penggunaan</h2>
        </div>

        <form action="{{ route('penggunaan.update', $penggunaan->id_penggunaan) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nomor_kwh" class="form-input" value="{{ $penggunaan->pelanggan->no_kwh }}" readonly>
            <input type="hidden" name="id_pelanggan" value="{{ $penggunaan->id_pelanggan }}">

            <input type="text" name="bulan" class="form-input" value="{{ $penggunaan->bulan }}" required>
            <input type="number" name="tahun" class="form-input" value="{{ $penggunaan->tahun }}" required>
            <input type="number" name="meter_awal" class="form-input" value="{{ $penggunaan->meter_awal }}" required>
            <input type="number" name="meter_akhir" class="form-input" value="{{ $penggunaan->meter_akhir }}" required>

            <div style="text-align: center; margin-top: 10px;">
                <button type="submit" class="simpan">Simpan</button>
            </div>
        </form>
    </div>

    <div class="v">
        <img src="/img/lightbulb.png" style="width: 90%; height: 90%;" alt="Lamp Icon">
        <p style="text-align : center ; margin-top:25px; font-size: 20px; font-family: 'inria serif', serif;">
            Catat penggunaan listrik pelangganmu <br>lebih cepat, tepat, dan akurat!
        </p>
    </div>
</div>
@endsection