<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LoginController;

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
        Route::post('/login', [LoginController::class, 'login_action'])->name('login.action');
    });
// End Guests' Routes

// Admin's Routes
Route::middleware('auth','role:ketua_rt')->group(function () {

    Route::get('/ketua_rt/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.ketua_rt');

    Route::resource('/ketua_rt/activities', ActivitiesController::class);

    Route::resource('/ketua_rt/kartukeluarga', KartuKeluargaController::class);

    Route::get('/storage');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
// End Admin's Routes

Route::middleware(['auth', 'role:warga'])->group(function () {
    //
});
