<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penggunaan - ListrikPay</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">

   <style>
    /* Umum */
    body {
        background: linear-gradient(to bottom, #1e90ff, #007bff);
        color: white;
        text-align: center;
        margin: 0px;
        min-height: 100vh;
        font-family: 'Inria Serif', serif;
    }

    /* Navbar */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(102, 102, 102, 0.4));
        font-family: 'Inria Serif', serif;
    }

    .logo {
        font-size: 1.5rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        font-family: 'Bungee Inline', serif;
        color: white;
    }

    .logo img {
        height: 60px;
        margin-right: 8px;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 0px;
        align-items: center;
    }

    .nav-links li {
        position: relative;
    }

    .nav-links li a {
        color: white;
        text-decoration: none;
        padding: 6px 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .nav-links li a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        cursor: pointer;
    }

    .nav-links li a.active {
        background-color: transparent;
    }

    /* Dropdown */
    .dropdown-toggle::after {
        content: " ▼";
        font-size: 0.75em;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        top: 100%;
        right: 0;
        min-width: 200px;
        z-index: 99;
        text-align: left;
        border-radius: 6px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px 16px;
        color: black;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
        font-size: 0.95rem;
    }

    .dropdown-menu a:hover {
        background-color: #1e90ff !important;
        color: white !important;
    }

    .logout-form button {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        font-family: inherit;
        font-size: 1rem;
        padding: 6px 10px;
        border-radius: 4px;
    }

    .logout-form button:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .welcome {
        margin-top: 15%;
        font-size: 2.5rem;
        font-weight: bold;
    }

    .tagline {
        margin-top: 1rem;
        font-style: italic;
        color: #dcdcdc;
    }

    /* Tombol */
    .btn {
        display: inline-block;
        text-align: center;
        padding: 8px 15px;
        font-size: 14px;
        border: 1px solid transparent;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-success {
        background-color: #198754;
        color: #fff;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #000;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 0.875rem;
        border-radius: 0.2rem;
    }

    /* Form */
    .form-control {
        width: 100%;
        padding: 8px 10px;
        font-size: 14px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        outline: none;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }

    /* Layout utility */
    .d-flex { display: flex; }
    .justify-content-between { justify-content: space-between; }
    .justify-content-center { justify-content: center; }
    .align-items-center { align-items: center; }
    .flex-wrap { flex-wrap: wrap; }
    .me-2 { margin-right: 0.5rem; }
    .ms-3 { margin-left: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .mt-3 { margin-top: 1rem; }
    .mt-md-0 { margin-top: 0; }
    .mb-3 { margin-bottom: 1rem; }
    .gap-1 { gap: 0.25rem; }

   /* Table Responsive */
.table-responsive {
    width: 100%;
    overflow-x: auto;
    margin-top: 1rem;
    padding: 0.5rem;
    border-radius: 12px;

}

/* Table Utama */
.tabel {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-family: 'Inria Serif', serif;
    font-size: 14px; /* Lebih besar */
    table-layout: auto; /* biar gak maksa sempit */
    overflow: hidden;
}

/* Header Tabel */
.tabel thead th {
    background-color: #f8cf61 !important;
    color: black !important;
    padding: 10px;
    font-weight: bold;
    text-align: center;
    border: 1px solid #ccc;
   
    
}

/* Body Tabel */
.tabel tbody td {
    background-color: #f9f9f9ff;
    color: black;
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
}

    /* Alert / Notifikasi */
    .alert {
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 4px;
        font-size: 14px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Pagination */
    .pagination {
        display: flex;
        list-style: none;
        padding-left: 0;
    }

    .pagination li {
        margin: 0 4px;
    }

    .pagination a, .pagination span {
        display: block;
        padding: 6px 12px;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        color: #007bff;
        text-decoration: none;
        border-radius: 4px;
    }

    .pagination .active span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination a:hover {
        background-color: #e9ecef;
    }
</style>
</head>
<body>

    <!-- Navbar -->
   <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('img/lightning.png') }}" alt="logo"> ListrikPay
        </div>

        <ul class="nav-links">
            <li><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
            <li><a href="{{ route('penggunaan.index') }}">Penggunaan</a></li>
            <li><a href="{{ route('tagihan.index') }}">Tagihan</a></li>
            <li><a href="{{ route('pembayaran.index') }}">Pembayaran</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Laporan</a>
                <div class="dropdown-menu">
                    <a style="color:black;" href="{{ route('laporan.pembayaran') }}">Laporan Pembayaran</a>
                    <a style="color:black;" href="{{ route('laporan.tagihan') }}">Laporan Tagihan Belum Lunas</a>
                </div>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav> 

    <!-- Konten -->
   <div class="container table-container" style="background-color: #ffffff ; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin:40px; ">
        <div class="container" style="margin-top: 20px;">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <form action="{{ route('penggunaan.index') }}" method="GET" class="d-flex align-items-center" style="max-width: 600px; flex: 1;">
                    <input type="text" name="search" class="form-control me-2" style="width: 300px;" placeholder="Cari Nama, Bulan, Tahun atau Nomor KWH" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </form>
                <a href="{{ route('penggunaan.create') }}" class="btn btn-success ms-3 mt-2 mt-md-0">+ Tambah Penggunaan</a>
            </div>

        @if (session('success'))
        <div class="alert alert-success" id="notif-success">
            {{ session('success') }}
        </div>

        <script>
            // Sembunyikan notifikasi setelah 3 detik
            setTimeout(function () {
                var notif = document.getElementById('notif-success');
                if (notif) {
                    notif.style.transition = 'opacity 0.5s ease';
                    notif.style.opacity = '0';
                    setTimeout(() => notif.remove(), 500); // hapus dari DOM
                }
            }, 3000); // 3000 ms = 3 detik
        </script>
        @endif

                {{-- Notifikasi Error --}}
        @if (session('error'))
            <div class="alert alert-danger" id="notif-error">
                {{ session('error') }}
            </div>
            <script>
                setTimeout(function () {
                    var notif = document.getElementById('notif-error');
                    if (notif) {
                        notif.style.transition = 'opacity 0.5s ease';
                        notif.style.opacity = '0';
                        setTimeout(() => notif.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

            <div class="table-responsive" >
                <table class="tabel text-center" style="border-top-left-radius: 12px; border-top-right-radius:12px; overflow: hidden;" >
                    <thead >
                        <tr>
                            <th >No</th>
                            <th>Nama Pelanggan</th>
                            <th>No KWH</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Meter Awal</th>
                            <th>Meter Akhir</th>
                            <th>Pemakaian (kWh)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #f0f8ff;">
                        @forelse($penggunaan as $index => $item)
                            <tr>
                                <td>{{ $index + $penggunaan->firstItem() }}</td>
                                <td style="text-align: left;">{{ $item->pelanggan->nama_pelanggan ?? 'Pelanggan Terhapus' }}</td>
                                <td>{{ $item->pelanggan->nomor_kwh ?? '-' }}</td>
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->meter_awal }}</td>
                                <td>{{ $item->meter_akhir }}</td>
                                <td>{{ $item->meter_akhir - $item->meter_awal }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('penggunaan.edit', $item->id_penggunaan) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('penggunaan.destroy', $item->id_penggunaan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">Data penggunaan belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $penggunaan->links() }}
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
</body>
</html>