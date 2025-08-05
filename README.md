ListrikPay adalah aplikasi berbasis Laravel untuk mengelola pembayaran listrik pascabayar. Proyek ini dirancang dengan Livewire dan memiliki fitur pelanggan, penggunaan, tagihan, dan laporan pembayaran.


<img width="1512" height="982" alt="Image" src="https://github.com/user-attachments/assets/51be9045-1a8a-4119-9100-da9a9da7b623" />
<img width="1512" height="982" alt="Image" src="https://github.com/user-attachments/assets/b6db957d-6b6a-455d-918a-fc9c1d458a1d" />

## 🔧 Spesifikasi Proyek

- 🖥️ Framework: Laravel 10
- 🗃️ Database: MySQL
- 🌐 Bahasa: PHP, Blade, Livewire
- 📁 Tools: Composer, Artisan CLI
- 🔐 Fitur: Login multi-level (admin & pelanggan), CRUD, laporan tagihan, pembayaran



📌 Catatan Penting untuk Menjalankan Proyek Ini (.env & Migrasi Database)

Untuk menjalankan proyek ini di lokal, pastikan kamu mengikuti langkah-langkah berikut:
jangan lupa jalankan diterminal atau vscode kamu dan pastikan path nya sudah berada di proyek kamu contoh PS C:\xampp2\htdocs\listrikapp> 
baru menjalankan perintah dibawah :

composer install
npm install


---

✅ 1. Duplikat File .env.example

Buat file baru dengan nama .env dari file .env.example yang sudah tersedia:

cp .env.example .env

> Jika menggunakan Windows dan cp tidak tersedia, kamu bisa salin manual file env.example lalu ubah namanya menjadi .env.




---

✅ 2. Sesuaikan Konfigurasi .env

Buka file .env, lalu ubah bagian konfigurasi database sesuai pengaturan lokalmu:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_kamu
DB_USERNAME=root
DB_PASSWORD=

> Ganti nama_database_kamu dengan nama database yang sudah kamu buat di MySQL.




---

✅ 3. Generate Key Aplikasi

Setelah .env selesai diatur, jalankan perintah ini di terminal untuk generate application key:

php artisan key:generate


---

✅ 4. Jalankan Migrasi Database

Jalankan migrasi untuk membuat struktur tabel di database:

php artisan migrate

> Jika kamu sudah memiliki data seed atau ingin testing, kamu bisa tambahkan --seed:



php artisan migrate --seed

jangan lupa ketik dibawah ini untuk menjalankan di browser kamu

php artisan serve


---

✅ 5. Jalankan Proyek Laravel

untuk penamaan Database terserah asalkan harus sama dengan yang ada di file .env
dibawah ini struktur pembuatan database di mysql

CREATE DATABASE listrik_db;
USE listrik_db;

CREATE TABLE level (
  id_level INT AUTO_INCREMENT PRIMARY KEY,
  nama_level VARCHAR(50)
);

CREATE TABLE users (
  id_user INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(50),
  nama_admin VARCHAR(100),
  id_level INT,
  FOREIGN KEY (id_level) REFERENCES level(id_level)
);

CREATE TABLE tarif (
  id_tarif INT AUTO_INCREMENT PRIMARY KEY,
  daya INT,
  tarifperkwh INT
);

CREATE TABLE pelanggan (
  id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(50),
  nomor_kwh VARCHAR(30),
  nama_pelanggan VARCHAR(100),
  alamat TEXT,
  id_tarif INT,
  FOREIGN KEY (id_tarif) REFERENCES tarif(id_tarif)
);

CREATE TABLE penggunaan (
  id_penggunaan INT AUTO_INCREMENT PRIMARY KEY,
  id_pelanggan INT,
  bulan VARCHAR(20),
  tahun INT,
  meter_awal INT,
  meter_akhir INT,
  FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
);

CREATE TABLE tagihan (
  id_tagihan INT AUTO_INCREMENT PRIMARY KEY,
  id_penggunaan INT,
  id_pelanggan INT,
  bulan VARCHAR(20),
  tahun INT,
  jumlah_meter INT,
  status VARCHAR(20),
  FOREIGN KEY (id_penggunaan) REFERENCES penggunaan(id_penggunaan),
  FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
);

CREATE TABLE pembayaran (
  id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
  id_tagihan INT,
  id_pelanggan INT,
  tanggal_pembayaran DATE,
  bulan_bayar VARCHAR(20),
  biaya_admin INT,
  total_bayar INT,
  id_user INT,
  FOREIGN KEY (id_tagihan) REFERENCES tagihan(id_tagihan),
  FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan),
  FOREIGN KEY (id_user) REFERENCES users(id_user)
);

Sekarang kamu sudah siap menjalankan proyek:

informasi kontak
Email : zedzohir23@gmail.com
instagram : @itsalter23
