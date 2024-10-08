<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratAhliWarisController;
use App\Http\Controllers\SettingsController;

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


// Middleware's Route
    Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware();
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware();

// Ketua RT's Routes
Route::middleware(\App\Http\Middleware\KetuaRTMiddleware::class)->group(function () {

    //Kelola Kegiatan
    Route::resource('/manage/activities', ActivitiesController::class);

    //Kelola Kartu Keluarga
    Route::resource('/manage_data/kartukeluarga', KartuKeluargaController::class);
    Route::get('/manage_data/kartukeluarga/aktifkan/{id}', [KartuKeluargaController::class, 'aktifkan'])->name('kartukeluarga.aktifkan');
    Route::get('/manage_data/kartukeluarga/nonaktifkan/{id}', [KartuKeluargaController::class, 'nonaktifkan'])->name('kartukeluarga.nonaktifkan');

    //Kelola Warga
    Route::resource('/manage_data/warga', WargaController::class);

    //Kelola Users
    Route::resource('/manage_data/users', UserController::class);
    Route::get('/manage_data/users/aktifkan/{id}', [UserController::class, 'aktifkan'])->name('user.aktifkan');
    Route::get('/manage_data/users/nonaktifkan/{id}', [UserController::class, 'nonaktifkan'])->name('user.nonaktifkan');

    //Kelola Pengajuan Surat
    Route::resource('/manage/submission_letter', SuratAhliWarisController::class);
    Route::get('/manage/submission_letter/diterima/{id}', [SuratAhliWarisController::class, 'diterima'])->name('surat.diterima');
    Route::get('/manage/submission_letter/ditolak/{id}', [SuratAhliWarisController::class, 'ditolak'])->name('surat.ditolak');

    //Kelola Setting
    Route::resource('/setting', SettingsController::class);

    Route::get('/storage');
});
// End Ketua RT's Routes

// Warga's Routes
Route::middleware(\App\Http\Middleware\WargaMiddleware::class)->group(function () {
    Route::resource('surat_ahli_waris', SuratAhliWarisController::class);
    Route::get('/surat_ahli_waris/print/{id}', [SuratAhliWarisController::class, 'print'])->name('surat.print');
});
