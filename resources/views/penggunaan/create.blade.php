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

    #kwhSuggestions {
        position: absolute;
        background: white;
        z-index: 1000;
        border: 1px solid #ccc;
        border-radius: 4px;
        max-height: 150px;
        overflow-y: auto;
    }

    .list-group-item {
        padding: 8px 12px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }

    .list-group-item:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="flex flex-col md:flex-row items-center justify-between px-10 py-16 text-white">
    <!-- Form Tambah Penggunaan -->
    <div class="bg-white rounded-xl p-8 w-full max-w-md shadow-lg text-black" style="position: relative;">
        <div class="flex items-center mb-4">
            <div class="text-yellow-500 text-3xl">
                <img src="/img/lightning.png" alt="logo" width="60%">
            </div>
            <h2 class="h2">Tambah Penggunaan</h2>
        </div>

        <form action="{{ route('penggunaan.store') }}" method="POST" autocomplete="off">
            @csrf

            <!-- Autocomplete Nomor KWH -->
            <input type="text" name="nomor_kwh" id="nomor_kwh" placeholder="Nomor KWH" class="form-input" required>
            <div id="kwhSuggestions"></div>

            <!-- Hidden ID Pelanggan -->
            <input type="hidden" name="id_pelanggan" id="id_pelanggan">

            <input type="text" name="bulan" placeholder="Bulan (Contoh: Juli)" class="form-input" required>
            <input type="number" name="tahun" placeholder="Tahun (Contoh: 2025)" class="form-input" required>
            <input type="number" name="meter_awal" placeholder="Meter Awal" class="form-input" required>
            <input type="number" name="meter_akhir" placeholder="Meter Akhir" class="form-input" required>

            <div style="text-align: center; margin-top: 10px;">
                <button type="submit" class="simpan">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Gambar Samping -->
    <div class="v">
        <img src="/img/lightbulb.png" style="width: 90%; height: 90%;" alt="Lamp Icon">
        <p style="text-align : center ; margin-top:25px; font-size: 20px; font-family: 'inria serif', serif;">
            Catat penggunaan listrik pelangganmu <br>lebih cepat, tepat, dan akurat!
        </p>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const noKwhInput = document.getElementById('nomor_kwh');
    const suggestions = document.getElementById('kwhSuggestions');
    const idPelangganInput = document.getElementById('id_pelanggan');

    noKwhInput.addEventListener('input', function () {
        let query = this.value;
        if (query.length > 2) {
            fetch(`/api/pelanggan/search-kwh?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    suggestions.innerHTML = '';
                    data.forEach(item => {
                        let div = document.createElement('div');
                        div.classList.add('list-group-item');
                        div.textContent = `${item.no_kwh} - ${item.nama}`;
                        div.addEventListener('click', function () {
                            noKwhInput.value = item.no_kwh;
                            idPelangganInput.value = item.id_pelanggan;
                            suggestions.innerHTML = '';
                        });
                        suggestions.appendChild(div);
                    });
                });
        } else {
            suggestions.innerHTML = '';
        }
    });

    document.addEventListener('click', function (e) {
        if (!suggestions.contains(e.target) && e.target !== noKwhInput) {
            suggestions.innerHTML = '';
        }
    });
});
</script>
@endsection