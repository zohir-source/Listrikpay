<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan - ListrikPay</title>
    <!-- Tambahkan di dalam <head> --> 
    <head>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">
    </head>
    <style>
        body {
            
            background: linear-gradient(to bottom, #1e90ff, #007bff);
            color: white;
            text-align: center;
            height: 100vh;
            margin: 0;
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
        thead tr {
            background-color: #f8cf61 !important; color: white !important;
        }
      
    .tabel thead tr {
        background-color: #f8cf61 !important;
        color: black !important;
    }

    .tabel tbody {
        background-color: #f9f9f9ff;
    }

    .tabel {
        font-family: 'Inria Serif', serif;
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .tabel th,
    .tabel td {
        border: 1px solid #ccc;
        padding: 8px;
        color: black;
    }
    /* Container */
.container {
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 15px;
    padding-right: 15px;
}

/* Flex utilities */
.d-flex {
    display: flex;
}
.justify-content-between {
    justify-content: space-between;
}
.align-items-center {
    align-items: center;
}
.flex-wrap {
    flex-wrap: wrap;
}

/* Margin utilities */
.mb-3 {
    margin-bottom: 1rem;
}
.mt-2 {
    margin-top: 0.5rem;
}
.mt-md-0 {
    margin-top: 0;
}
.ms-3 {
    margin-left: 1rem;
}
.me-2 {
    margin-right: 0.5rem;
}

/* Form control */
.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}

/* Tombol Tambah, Edit, Hapus */
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    text-decoration: none;
    transition: background-color 0.3s ease;
    cursor: pointer;
}

.btn:hover {
    opacity: 0.9;
}
.btn-secondary {
    background-color: #6c757d;
    color: #fff;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.btn-success {
    background-color: #198754;
    color: white;
}

.btn-warning {
    background-color: #ffc107;
    color: black;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-sm {
    padding:4px 8px;
    font-size: 0.875rem;
    border-radius: 0.2rem;
}

/* Responsive table */
.table-responsive {
    width: 100%;
    overflow-x: auto;
}

/* Text alignment */
.text-center {
    text-align: center;
}

/* Alerts */
.alert {
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}
.alert-success {
    color: #0f5132;
    background-color: #d1e7dd;
    border-color: #badbcc;
}
    
</style>
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
    <div class="container"  style="background-color: #ffffff ; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-top:40px; padding-top:10px; "> 
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap" style="margin-top: 20px;">
            <form action="{{ route('pelanggan.index') }}" method="GET" class="d-flex align-items-center" style="max-width: 600px; flex: 1;">
                <input type="text" name="search" class="form-control me-2" style="width: 300px;" placeholder="Cari nama atau nomor KWH" value="{{ request('search') }}">
                <button type="submit" class="btn btn-secondary">Cari</button>
            </form>
            <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm">+ Tambah Pelanggan</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tambahkan link font di bagian atas (head) layout jika belum -->


        <div class="table-responsive" style="border-top-left-radius: 12px; border-top-right-radius:12px; overflow: hidden;">
            <table class="tabel" style="font-family: 'Inria Serif', serif; font-size: 14px;">
                <thead style="background-color: #f8cf61 !important; color: white; text-align: center;">
                    <tr >
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No. KWH</th>
                        <th>Daya (VA)</th>
                        <th>Tarif/KWH</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #f0f8ff;">
                    @forelse ($pelanggan as $index => $p)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td style="text-align: left;">{{ $p->nama_pelanggan }}</td>
                            <td>{{ $p->username }}</td>
                            <td>{{ $p->nomor_kwh }}</td>
                            <td>{{ $p->tarif->daya ?? '-' }}</td>
                            <td style="text-align: left;">Rp{{ number_format($p->tarif->tarifperkwh ?? 0) }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td class="align-middle text-center">
                                <div class="d-flex align-items-center justify-content-center gap-1" style="display: flex; align-items: center; justify-content: center; gap: 3px;">
                                    <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<!-- Bootstrap JS -->

</body>
</html>