<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ListrikPay - Login</title>
     <head>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">
    </head>
    <style>
        body {
            display: flex;
            justify-content: center;
            background: linear-gradient(to bottom, #0096ff, #0066cc);
            font-family: 'Inria Serif', serif;
        }
        .login-box {
            background: #5bbcf6;
            width: 400px;
            padding: 30px;
            margin: 80px auto;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
            text-align: center;
        }
        input, button {
            display: block;
            width: 90%;
            margin: 7px auto;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        .ingat-saya {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 15px auto;
            justify-content: flex-start;
        }
        input[type="checkbox"] {
            width: auto;
            padding: 0;
            margin: 0;
        }
        .ingat-saya-wrapper {
            padding-left: 30px;
        }
    </style>
</head>
<body>
    <div class="login-box" >
        <h2>Selamat Datang</h2>
        <img src="{{ asset('img/lightning.png')}}" alt="logo" width="60">
        <h3 style=" font-family: 'Bungee inline', serif; color: white;">ListrikPay</h3>
        <h4>Masuk ke akun anda</h4>
        <form method="POST" action="{{ route('pelanggan.login.submit') }}">
            @csrf
            <input type="text" name="username" placeholder="Masukkan Username" required>
            <input type="password" name="password" placeholder="Masukkan Kata Sandi" required>
            <div class="ingat-saya-wrapper">
                <div class="ingat-saya">
                    <label for="remember">Ingat saya</label>
                    <input type="checkbox" name="remember">
                </div>
            </div>
            <button type="submit">Masuk</button>
        </form>
        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
    </div>
</body>
</html>