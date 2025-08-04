<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tagihan Pelanggan - ListrikPay</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom, #1e90ff, #007bff);
            color: white;
            margin: 0;
            font-family: 'Inria Serif', serif;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            font-family: 'Bungee Inline', serif;
            color: white;
            margin-left: 20px;
        }
        .logo img {
            height: 60px;
            margin-right: 10px;
        }
        .navbar {
    background: linear-gradient(to right, rgba(0, 0, 0, 0.3) 0%, rgba(102, 102, 102, 0.4) 100%);
    padding: 1rem 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.container-fluid {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.navbar-toggler {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
}

.navbar-toggler-icon {
    display: inline-block;
    width: 30px;
    height: 3px;
    background-color: white;
    position: relative;
}
.navbar-toggler-icon::before,
.navbar-toggler-icon::after {
    content: '';
    position: absolute;
    width: 30px;
    height: 3px;
    background-color: white;
    left: 0;
}
.navbar-toggler-icon::before {
    top: -10px;
}
.navbar-toggler-icon::after {
    top: 10px;
}

.navbar-collapse {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: center;
    gap: 1rem;
}

.navbar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: row;
    gap: 1rem;
}

.nav-item {
    display: inline-block;
}

.nav-link {
    text-decoration: none;
    color: white;
    font-weight: 500;
    padding: 0.25rem 0.5rem;
    transition: color 0.3s ease;
    border-radius: 4px;
}

.nav-link:hover,
.nav-link.active {
    background-color: rgba(255, 255, 255, 0.2);
    color: #fff;
}

.btn.btn-link {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    font-weight: 500;
    padding: 0.25rem 0.5rem;
    transition: color 0.3s ease;
    text-decoration: none;
    border-radius: 4px;
}

.btn.btn-link:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Responsive toggle (opsional) */
@media (max-width: 768px) {
    .navbar-toggler {
        display: block;
    }

    .navbar-collapse {
        display: none;
        width: 100%;
        flex-direction: column;
        background: rgba(0, 0, 0, 0.4);
        padding: 1rem;
    }

    .navbar-collapse.show {
        display: flex;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
    }
}
        .table-container {
            margin: 40px;
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

        /* H3 margin bawah (mengganti .mb-4) */
.mb-4 {
    margin-bottom: 1.5rem;
    color: black;
    font-size: 25px;
    text-align: center;
}

/* Alert success (mengganti .alert.alert-success) */
.alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
    padding: 0.75rem 1.25rem;
    border-radius: 4px;
    margin-bottom: 1rem;
}

/* Text center */
.text-center {
    text-align: center;
}

/* Tombol "Bayar" mengganti .btn.btn-danger.btn-sm */
.btn {
    display: inline-block;
    font-weight: 500;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

/* Kecilkan tombol */
.btn-sm {
    padding: 3px 10px;
    font-size: 13px;
}

/* Lunas label mengganti .text-success */
.text-success {
    color: #28a745;
    font-weight: bold;
}
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background: linear-gradient(to right, rgba(0,0,0,0.3), rgba(102,102,102,0.4));">
    <div class="container-fluid">
        <div class="logo">
            <img src="{{ asset('img/lightning.png') }}" alt="Logo"> ListrikPay
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('penggunaan.index') }}">Penggunaan</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('pelanggan.tagihan.index') }}">Tagihan</a></li>
            </ul>
            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <form action="{{ route('pelanggan.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-link nav-link" type="submit">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Konten Utama -->
<div class="container table-container">
    <h3 class="mb-4">Daftar Tagihan Anda</h3>

    @if(session('success'))
        <div class="alert alert-success text-center" id="notif-success">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                const notif = document.getElementById('notif-success');
                if (notif) {
                    notif.style.transition = 'opacity 0.5s ease';
                    notif.style.opacity = '0';
                    setTimeout(() => notif.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor KWH</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah Meter</th>
                    <th>Tarif/kwh</th>
                    <th>Total Tagihan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody style="background-color: #f9f9f9; color: black;">
                @forelse($tagihan as $i => $item)
                    @php
                        $tarif = $item->pelanggan->tarif->tarifperkwh ?? 0;
                        $total = ($item->jumlah_meter * $tarif) + 2500;
                    @endphp
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->pelanggan->nomor_kwh }}</td>
                        <td>{{ $item->bulan }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jumlah_meter }}</td>
                        <td>{{ number_format($tarif, 0, ',', '.') }}</td>
                        <td style="text-align:left;">Rp{{ number_format($total, 0, ',', '.') }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if($item->status == 'Belum Bayar')
                                <form action="{{ route('pelanggan.tagihan.bayar', $item->id_tagihan) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Bayar</button>
                                </form>
                            @else
                                <span class="text-success">✓ Lunas</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Tidak ada data tagihan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


</body>
</html>