<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Tagihan - ListrikPay</title>
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
        .tabel tbody {
            background-color: #f9f9f9;
            color: black;
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
        /* Ganti Bootstrap dengan CSS biasa */

/* Container */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Table Container */
.table-container {
    margin-top: 40px;
    background-color: white;
    border-radius: 12px;
    padding: 20px;
    color: black;
}

/* Flex row for search and action */
.d-flex {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.flex-wrap {
    flex-wrap: wrap;
}

.justify-content-between {
    justify-content: space-between;
}

.justify-content-center {
    justify-content: center;
}

.align-items-center {
    align-items: center;
}

/* Search form */
.search-form input[type="text"] {
    width: 300px;
    padding: 8px 12px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
}

.search-form button {
    padding: 8px 16px;
    background-color: #444;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.search-form button:hover {
    background-color: #1e90ff;
}

/* Alert success */
.alert-success {
    background-color: #d4edda;
    color: #155724;
    border-radius: 6px;
    padding: 10px;
    margin-bottom: 10px;
    font-size: 14px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    border-radius: 12px;
    overflow: hidden;
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

/* Khusus untuk td nama agar kiri */
td:first-child + td {
    text-align: left;
}

/* Tombol kecil */
.btn-sm {
    padding: 4px 12px;
    font-size: 13px;
    border-radius: 6px;
    cursor: pointer;
}

/* Button tandai lunas */
.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Pagination (Laravel default) */
ul.pagination {
    list-style: none;
    display: flex;
    justify-content: center;
    padding-left: 0;
    margin-top: 20px;
}

ul.pagination li {
    margin: 0 4px;
}

ul.pagination li a,
ul.pagination li span {
    display: block;
    padding: 6px 12px;
    border: 1px solid #ccc;
    color: #333;
    text-decoration: none;
    border-radius: 4px;
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

    <!-- Konten Utama -->
    <div class="container table-container" style="background-color: #ffffff ;">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap" style="margin-bottom: 16px; margin-top:20px">
            <form action="{{ route('tagihan.index') }}" method="GET" class="search-form d-flex flex-wrap">
                <input type="text" name="search" class="form-control" placeholder="Cari Nama, Bulan, Tahun, KWH..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-secondary">Cari</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center" id="notif-success">
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

        <div class="table-responsive">
            <table style="border-top-left-radius: 12px; border-top-right-radius:12px; overflow: hidden;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor KWH</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jumlah Meter</th>
                        <th>Total Tagihan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #f9f9f9; color: black;">
    @forelse($tagihan as $i => $item)
        <tr>
            <td>{{ $i + $tagihan->firstItem() }}</td>
            <td style="text-align: left;">{{ $item->pelanggan->nama_pelanggan ?? 'Pelanggan sudah dihapus' }}</td>
            <td>{{ $item->pelanggan->nomor_kwh ?? '-' }}</td>
            <td>{{ $item->bulan }}</td>
            <td>{{ $item->tahun }}</td>
            <td>{{ $item->jumlah_meter }}</td>
            <td style="text-align: left;">
                @if($item->pembayaran)
                    Rp{{ number_format($item->pembayaran->total_bayar, 0, ',', '.') }}
                @elseif($item->pelanggan && $item->pelanggan->tarif)
                    @php
                        $tarif = $item->pelanggan->tarif->tarifperkwh;
                        $total = ($item->jumlah_meter * $tarif) + 2500;
                    @endphp
                    Rp{{ number_format($total, 0, ',', '.') }}
                @else
                    -
                @endif
            </td>
            <td>{{ $item->status }}</td>
            <td>
                @if($item->status === 'Belum Bayar')
                    <form action="{{ route('tagihan.lunas', $item->id_tagihan) }}" method="POST" onsubmit="return confirm('Tandai lunas?')">
                        @csrf
                        <button class="btn btn-danger btn-sm">Tandai Lunas</button>
                    </form>
                @else
                    <span class="text-success">✓ Lunas</span>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="9">Data tagihan belum tersedia.</td>
        </tr>
    @endforelse
</tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $tagihan->links() }}
        </div>
    </div>

    
</body>
</html>