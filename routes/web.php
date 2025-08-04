<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LevelController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\PenggunaanPelangganController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LoginPelangganController;
use App\Http\Controllers\TagihanPelangganController;
use App\Http\Controllers\LaporanController;

// Login umum (admin)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ============================
// Dashboard (setelah login)
// ============================

// Admin
Route::get('home', function () {
    return view('home');
})->middleware('auth');    

// Pelanggan

Route::get('/login/pelanggan', [LoginPelangganController::class, 'showLoginForm'])->name('pelanggan.login');
Route::post('/login/pelanggan', [LoginPelangganController::class, 'login'])->name('pelanggan.login.submit');
Route::post('/logout/pelanggan', [LoginPelangganController::class, 'logout'])->name('pelanggan.logout');

// Setelah login sukses
Route::get('/pelanggan/home', function () {
    return view('pelanggan.home');
})->name('pelanggan.home');


Route::middleware(['auth:pelanggan'])->group(function () {
    Route::get('/penggunaan', [PenggunaanPelangganController::class, 'index'])->name('pelanggan.penggunaan.index');
});

// Untuk pelanggan
Route::middleware(['auth:pelanggan'])->group(function () {
    Route::get('/pelanggan/tagihan', [TagihanPelangganController::class, 'index'])->name('pelanggan.tagihan.index');
});

Route::get('/pelanggan/tagihan', [TagihanPelangganController::class, 'index'])->name('pelanggan.tagihan.index');
Route::post('/pelanggan/tagihan/bayar/{id}', [TagihanPelangganController::class, 'bayar'])->name('pelanggan.tagihan.bayar');




Route::get('/pelanggan/penggunaan', [PenggunaanController::class, 'index'])->name('pelanggan.penggunaan');
Route::get('/pelanggan/penggunaan', [PenggunaanPelangganController::class, 'index'])
    ->name('pelanggan.penggunaan');
// ============================
// Rute Pelanggan (CRUD Otomatis)
// ============================

Route::get('/pelanggan/dashboard', [PelangganController::class, 'dashboard'])->name('pelanggan.dashboard');
Route::resource('pelanggan', PelangganController::class)->middleware('auth');
Route::get('/pelanggean',[PelangganController::class,'index'])->name('pelanggan.index');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

// ============================
// Rute Penggunaan (CRUD Otomatis)
// ============================
Route::resource('penggunaan', PenggunaanController::class)->middleware('auth');
//Route::get('/penggunaan/{penggunaan}/edit',[PenggunaanController::class,'edit'])->name('penggunaan.edit');
//Route::get('/penggunaan',[PenggunaanController::class,'index'])->name('penggunaan.index');
// routes/api.php
Route::get('/pelanggan/search-kwh', [PelangganController::class, 'searchKwh']);
//Route::get('/penggunaan/{id}/edit', [PenggunaanController::class, 'edit'])->name('penggunaan.edit');
//Route::put('/penggunaan/{id}', [PenggunaanController::class, 'update'])->name('penggunaan.update');


// ============================
// Rute Taighan (CRUD Otomatis)
// ============================
Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
Route::post('/tagihan/{id}/lunas', [TagihanController::class, 'tandaiLunas'])->name('tagihan.lunas');

// ============================
// Rute Pembayaran
// ============================
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
Route::get('/laporan/pembayaran', [PembayaranController::class, 'laporan'])->name('laporan.pembayaran');
// ============================
// Rute Laporan
// ============================
Route::prefix('laporan')->group(function () {
    Route::get('/pembayaran', [LaporanController::class, 'pembayaran'])->name('laporan.pembayaran');
    Route::get('/belum-bayar', [LaporanController::class, 'tagihanBelumLunas'])->name('laporan.belum_bayar');
    Route::get('/tagihan', [LaporanController::class, 'tagihanBelumLunas'])->name('laporan.tagihan');
    Route::get('/penggunaan', [LaporanController::class, 'penggunaan'])->name('laporan.penggunaan');
    Route::get('/rekap', [LaporanController::class, 'rekap'])->name('laporan.rekap');
    Route::get('/admin', [LaporanController::class, 'admin'])->name('laporan.admin');
});
Route::get('/laporan/pembayaran/cetak', [LaporanController::class, 'cetakPembayaran'])->name('laporan.pembayaran.cetak');
Route::get('/laporan/tagihan/cetak', [LaporanController::class, 'cetakTagihanBelumLunas'])->name('laporan.tagihan.cetak');


// Optional: Route cetak PDF jika butuh nanti
Route::get('/laporan/belum-bayar/cetak', [LaporanController::class, 'cetakTagihanBelumLunas'])->name('laporan.belum_bayar.cetak');

// ============================
// Rute Menu Dashborad Admin
// ============================

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/penggunaan', [PenggunaanController::class, 'index'])->name('penggunaan.index');
Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');











Route::middleware('auth')->group(function () {
    Route::post('/tagihan/lunas/{id}', [TagihanController::class, 'tandaiLunas'])->name('tagihan.lunas');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
});



// ============================
// Level (jika kamu pakai)
// ============================
Route::resource('level', LevelController::class)->middleware('auth');

// ============================
// Pengaturan Profil, Password, dll (Livewire)
// ============================
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// ============================
// Default Routes
// ============================
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');