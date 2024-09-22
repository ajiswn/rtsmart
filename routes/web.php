<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengurusController;

//Guests' Routes
    //Route Beranda
    Route::get('/', [GuestController::class, 'index']); 

    //Route Tentang Kami
    Route::get('/about_us', [GuestController::class, 'tentang_kami']); 

    //Route Artikel, Detail Artikel, dan Kategori Artikel
    Route::get('/article', [GuestController::class, 'artikel']);
    Route::get('/detail_article/{id}', [GuestController::class, 'detail_artikel']);
    Route::get('/article/category/{kategori}', [GuestController::class, 'kategori_artikel']);

    //Route Pendaftaran
    Route::get('/registration', [GuestController::class, 'pendaftaran']);
    Route::post('/registration', [GuestController::class, 'pendaftaran_submit'])->name('daftar');

    // Route Login dilindungi, jika sudah login maka tidak bisa mengakses route ini.
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/login', [AdminController::class, 'login_action'])->name('login.action');
    });
// End Guests' Routes

// Admin's Routes
Route::middleware('auth')->group(function () {

    Route::get('/dasbor', [AdminController::class, 'dasbor'])->name('dasbor');

    Route::resource('artikel', ArtikelController::class);

    Route::resource('pendaftaran', PendaftaranController::class);
    Route::get('/pendaftaran/diterima/{id}', [PendaftaranController::class, 'diterima'])->name('pendaftaran.diterima');
    Route::get('/pendaftaran/ditolak/{id}', [PendaftaranController::class, 'ditolak'])->name('pendaftaran.ditolak');
    Route::get('/storage');

    Route::resource('pengurus', PengurusController::class);

    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});
