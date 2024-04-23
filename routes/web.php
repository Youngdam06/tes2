<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamannController;
use App\Http\Controllers\DaftarpinjamController;
use App\Http\Controllers\RegistertamuController;
use App\Http\Controllers\KategoriRelasiController;
use App\Http\Controllers\KategoriRelasiiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/layout', function () {
    return view('layouts.all');
});
// register tamu
Route::get('/register-tamu', [RegistertamuController::class, 'index'])->name('register-tamu');
Route::post('/register-tamu-store', [RegistertamuController::class, 'store'])->name('posregtamu');
// register admin petugas
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-store', [RegisterController::class, 'store'])->name('posreg');
// login dan logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-store', [LoginController::class, 'login'])->name('poslog');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/show-buku/{id}', [BukuController::class, 'show'])->name('showBuku');
    // ulasan dan rating buku
    Route::get('/ulasan-buku-create', [UlasanController::class, 'create'])->name('ulasan.create');
    Route::post('/ulasan-buku-store', [UlasanController::class, 'store'])->name('ulasan.store');
    // peminjaman buku
    Route::post('/pinjam-buku-store', [PeminjamanController::class, 'store'])->name('pinjambuku.store');
    Route::get('/daftar-pinjam', [DaftarpinjamController::class, 'index'])->name('daftarpinjam');
    // kembali buku
    Route::post('/daftarpinjam/{id}/kembali', [DaftarpinjamController::class, 'kembali'])->name('bukuKembali');
    // koleksi
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi');
    Route::post('/koleksi-store', [KoleksiController::class, 'store'])->name('koleksiStore');
});

Route::middleware(['admin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
    Route::resource('kelolaPinjam', PeminjamanController::class)->middleware('admin');
    Route::resource('kelolaPetugas', PetugasController::class)->middleware('admin');
    Route::resource('kelolaBuku', BukuController::class)->middleware('admin');
    Route::resource('kelolaKategori', KategoriController::class)->middleware('admin');
    Route::resource('relasiKategori', KategoriRelasiController::class)->middleware('admin');
});
Route::middleware(['petugas'])->group(function() {
    Route::get('/petugasdash', [DashboardController::class, 'indexx'])->name('dashboardd')->middleware('petugas');
    Route::resource('kelolaPinjamm', PeminjamannController::class)->middleware('petugas');
    Route::resource('kelolaBukuu', BukuuController::class)->middleware('petugas');
    Route::resource('kelolaKategorii', KategoriiController::class)->middleware('petugas');
    Route::resource('relasiKategorii', KategoriRelasiiController::class)->middleware('petugas');
});

