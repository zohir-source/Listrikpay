<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penggunaan - ListrikPay</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom, #1e90ff, #007bff);
            color: white;
            text-align: center;
            margin: 0;
            min-height: 100vh;
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
            margin-right: 8px;
        }
        /* Tambahkan di bawah CSS yang sudah ada */

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

        .tabel thead {
            background-color: #f8cf61 !important;
            color: black !important;
        }

        .tabel tbody {
            background-color: #f9f9f9;
            color: black;
        }

        .tabel {
            font-family: 'Inria Serif', serif;
            width: 100%;
            border-collapse: collapse;
        }

        .tabel th,
        .tabel td {
            border: 1px solid #ccc;
            padding: 8px;
        }
      
    /* Kontainer utama */
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
        box-sizing: border-box;
    }

    .table-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin-top: 40px;
        padding-top: 10px;
    }

    /* Judul h4 */
    .mb-4 {
        margin-bottom: 1.5rem;
        font-size: 25px;
    }

    .text-black {
        color: black;
    }

    /* Responsif tabel */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
        border-radius: 12px;
    }

    /* Tabel */
    .tabel {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Inria Serif', serif;
    }

    .tabel thead {
        background-color: #f8cf61;
        color: black;
    }

    .tabel tbody {
        background-color: #f9f9f9;
        color: black;
    }

    .tabel th,
    .tabel td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    /* Responsive spacing & layout on small screens */
    @media (max-width: 768px) {
        .container {
            padding: 0 0.75rem;
        }

        .tabel th,
        .tabel td {
            font-size: 14px;
            padding: 8px;
        }

        h4 {
            font-size: 1.2rem;
        }
    }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.3) 0%, rgba(102, 102, 102, 0.4) 100%);">
    <div class="container-fluid">
        <div class="logo">
            <img src="{{ asset('img/lightning.png') }}" alt="logo"> ListrikPay
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#">Penggunaan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pelanggan.tagihan.index') }}">Tagihan</a></li>
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

<!-- Konten -->
<div class="container table-container" style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-top:40px; padding-top:10px;">
    <div class="container" style="margin-top: 40px;">
        <h4 class="mb-4 text-black">Data Penggunaan Listrik Anda</h4>

        <div class="table-responsive" style="border-radius: 12px; overflow: hidden;">
            <table class="tabel text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor KWH</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Meter Awal</th>
                        <th>Meter Akhir</th>
                        <th>Pemakaian KWH</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penggunaan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->pelanggan->nomor_kwh }}</td>
                            <td>{{ $item->bulan }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->meter_awal }}</td>
                            <td>{{ $item->meter_akhir }}</td>
                            <td>{{ $item->meter_akhir - $item->meter_awal }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Tidak ada data penggunaan ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>