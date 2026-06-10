<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PublikController; // Import PublikController

/*
|--------------------------------------------------------------------------
| RUTE PUBLIK / PENGUNJUNG (Bisa diakses siapa saja TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublikController::class, 'index'])->name('publik.index');
Route::get('/baca/{id}', [PublikController::class, 'detail'])->name('publik.detail');

/*
|--------------------------------------------------------------------------
| RUTE OTENTIKASI LOG IN & LOG OUT
|--------------------------------------------------------------------------
*/
// Guest middleware artinya HANYA yang BELUM login yang bisa buka halaman ini
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');

// Auth middleware artinya WAJIB login untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| RUTE CMS / BACKEND ADMIN (WAJIB LOGIN BARU BISA MASUK)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Halaman Dashboard utama admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Konten Bab 10
    Route::resource('kategori', KategoriArtikelController::class);
    Route::resource('penulis', PenulisController::class);
    Route::resource('artikel', ArtikelController::class);
});