<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home - ListrikPay</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inria Serif', serif;
            background: linear-gradient(to bottom, #1e90ff, #007bff);
            color: white;
            text-align: center;
            height: 100vh;
        }

        header {
            background-color: #0056b3;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 44px;
            margin-right: 8px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 2rem;
            font-weight: 500;
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

    <header>
        <div class="logo" style="font-family: 'Bungee Inline', serif;">
            <img src="{{ asset('img/lightning.png') }}" alt="logo"> ListrikPay
        </div>
        <nav>
            <a href="{{ route('pelanggan.penggunaan') }}">Penggunaan</a>
            <a href="{{ route('pelanggan.tagihan.index') }}">Tagihan</a>
            <a href="{{ route('pelanggan.login') }}">Log out</a>
        </nav>
    </header>

    <div class="welcome">
        Selamat datang, {{ session('pelanggan')->nama_pelanggan ?? 'Pelanggan' }}!
    </div>

    <div class="tagline">
        “ Solusi Cerdas Pembayaran Listrik Pasca Bayar “
    </div>

</body>
</html>