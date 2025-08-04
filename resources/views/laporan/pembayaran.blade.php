<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pembayaran - ListrikPay</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #1e90ff, #007bff);
            color: white;
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
        .table-container {
            margin-top: 100px;
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        thead {
            background-color: #f8cf61;
            font-weight: bold;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .btn-sm {
            padding: 3px 10px;
            font-size: 13px;
        }
        .search-form input[type="text"] {
            width: 300px;
            margin-right: 10px;
        }
        /* Container */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Table Container (sudah ada sebelumnya) */
.table-container {
    margin-top: 100px;
    background-color: white;
    border-radius: 12px;
    padding: 20px;
    color: black;
}

/* Heading tengah & margin bawah */
.text-center {
    text-align: center;
}
.mb-4 {
    margin-bottom: 1rem;
}
.mt-4 {
    margin-top: 1.5rem;
}

/* Flex utilities */
.d-flex {
    display: flex;
}
.flex-wrap {
    flex-wrap: wrap;
}
.justify-content-center {
    justify-content: center;
}
.text-end {
    text-align: right;
}

/* Form Pencarian */
.search-form input[type="text"],
.form-control {
    width: 300px;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
    margin-right: 10px;
}
.search-form input[type="text"]:focus {
    border-color: #1e90ff;
}

/* Tombol Umum */
.btn,
.btn-secondary,
.btn-sm,
.btn-danger {
    display: inline-block;
    padding: 8px 14px;
    font-size: 14px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
}
.btn-secondary {
    background-color: #444;
    color: white;
}
.btn-secondary:hover {
    background-color: #1e90ff;
}
.btn-sm {
    font-size: 13px;
    padding: 6px 12px;
}
.btn-danger {
    background-color: #dc3545;
    color: white;
}
.btn-danger:hover {
    background-color: #bd2130;
}

/* Table Responsiveness */
.table-responsive {
    overflow-x: auto;
}

/* Tabel Style */
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 14px;
}
thead {
    background-color: #f8cf61;
    font-weight: bold;
}
th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

/* Text Status */
.text-success {
    color: #28a745;
}
.fw-bold {
    font-weight: bold;
}

/* Pagination Laravel */
ul.pagination {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 6px;
    padding: 0;
    margin: 20px 0;
}
ul.pagination li {
    display: inline-block;
}
ul.pagination li a,
ul.pagination li span {
    display: block;
    padding: 6px 12px;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #333;
    font-size: 14px;
}
ul.pagination li.active span,
ul.pagination li a:hover {
    background-color: #1e90ff;
    color: white;
    border-color: #1e90ff;
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
<div class="container table-container"  style="margin-bottom: 16px; margin-top:40px">
    <h3 class="mb-4 text-center">Laporan Pembayaran</h3>

    <!-- Form pencarian -->
    <form action="{{ route('laporan.pembayaran') }}" method="GET" class="search-form d-flex flex-wrap mb-4">
        <input type="text" name="search" class="form-control" placeholder="Cari Nama, Bulan, Tahun atau Nomor KWH..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>
    </form>

    <!-- Tabel laporan -->
    <div class="table-responsive">
        <table style="border-top-left-radius: 12px; border-top-right-radius:12px; overflow: hidden;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomor KWH</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Tanggal Bayar</th>
                    <th>Biaya Admin</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pembayaran as $i => $item)
                    <tr>
                        <td>{{ $i + $pembayaran->firstItem() }}</td>
                        <td style="text-align: left;">{{ $item->tagihan->pelanggan->nama_pelanggan ?? 'Pelanggan dihapus' }}</td>
                        <td>{{ $item->tagihan->pelanggan->nomor_kwh ?? '-' }}</td>
                        <td>{{ $item->tagihan->bulan ?? '-' }}</td>
                        <td>{{ $item->tagihan->tahun ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pembayaran)->format('d-m-Y') }}</td>
                        <td style="text-align: left;">Rp{{ number_format($item->biaya_admin, 0, ',', '.') }}</td>
                        <td style="text-align: left;">Rp{{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        <td><span class="text-success fw-bold">Lunas</span></td>
                        <td>{{ $item->user->nama_admin ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Data pembayaran tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $pembayaran->links() }}
        </div>

        <!-- Tombol Cetak -->
        <div class="text-end mt-4">
           <a href="{{ route('laporan.pembayaran.cetak', ['search' => request('search')]) }}" target="_blank" class="btn btn-sm btn-danger">
    Cetak Laporan
</a>
        </div>
    </div>
</div>


</body>
</html>