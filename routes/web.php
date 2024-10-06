<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

//Guests' Routes
    //Route Beranda
    Route::get('/', [GuestController::class, 'index']); 

    //Route Kegiatan, Detail Kegiatan, dan Kategori Kegiatan
    Route::get('/activities', [GuestController::class, 'activities']);
    Route::get('/activities/detail/{id}', [GuestController::class, 'activities_detail']);
    Route::get('/activities/category/{category}', [GuestController::class, 'activities_category']);

    // Route Login dilindungi, jika sudah login maka tidak bisa mengakses route ini.
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
    });

    
// End Guests' Routes

// Ketua RT's Routes
Route::middleware(\App\Http\Middleware\KetuaRTMiddleware::class)->group(function () {

    Route::get('/ketua_rt/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.ketua_rt');

    Route::resource('/ketua_rt/activities', ActivitiesController::class);

    Route::resource('/ketua_rt/manage/kartukeluarga', KartuKeluargaController::class);
    Route::get('/ketua_rt/manage/kartukeluarga/aktifkan/{id}', [KartuKeluargaController::class, 'aktifkan'])->name('kartukeluarga.aktifkan');
    Route::get('/ketua_rt/manage/kartukeluarga/nonaktifkan/{id}', [KartuKeluargaController::class, 'nonaktifkan'])->name('kartukeluarga.nonaktifkan');

    Route::resource('/ketua_rt/manage/users', UserController::class);

    Route::get('/storage');

    
});
// End Ketua RT's Routes

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:warga'])->group(function () {
    //
});
