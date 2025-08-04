<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home - ListrikPay</title>

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Inria serif', serif;
            background: linear-gradient(to bottom, #1e90ff, #007bff);
            color: white;
            text-align: center;
            height: 100vh;
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

    <!-- Konten utama -->
    <div class="welcome">
        Selamat datang, {{ auth()->check() ? auth()->user()->nama_admin : (session('pelanggan')->nama_pelanggan ?? 'nama') }}!
    </div>

    <div class="tagline">
        “ Solusi Cerdas Pembayaran Listrik Pasca Bayar “
    </div>

</body>
</html>