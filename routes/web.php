<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LaporanController;
use App\Http\Controllers\User\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

// login route
Route::get('/login', [LoginUserController::class, 'index'])->name('login');
Route::post('/login', [LoginUserController::class, 'login']);

// register route
Route::get('/register', [RegisterUserController::class, 'index']);
Route::post('/register', [RegisterUserController::class, 'register']);

// profil route
Route::get('/profil', [ProfilController::class, 'index']);
Route::put('/profil', [ProfilController::class, 'editfoto']);
Route::put('/profil/password', [ProfilController::class, 'editpassword']);
Route::put('/profil/email', [ProfilController::class, 'editemail']);
Route::post('/profil/logout', [ProfilController::class, 'logout']);

// edit profil route
Route::get('/profil/editprofil', [ProfilController::class, 'editprofil']);
Route::put('/editprofil', [ProfilController::class, 'updateprofil']);

// laporan route
Route::get('/laporan/kategori', [LaporanController::class, 'kategoriLaporan']);
Route::get('/laporan/buat/{id}', [LaporanController::class, 'buatLaporan']);
Route::post('/laporan/kirim', [LaporanController::class, 'store']);
Route::get('/laporan/riwayat', [LaporanController::class, 'riwayatlaporan']);
Route::get('/laporan/show/{id}', [LaporanController::class, 'show']);

// admin route
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [LoginAdminController::class, 'index'])
        ->middleware('guest:admin')->name('login');

    Route::post('/login', [LoginAdminController::class, 'login'])
        ->middleware('guest:admin');

    Route::post('/logout', [LoginAdminController::class, 'logout'])
        ->middleware('auth:admin')
        ->name('logout');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // reports
        Route::get('/reports', [ReportsController::class, 'index']);
        Route::put('/reports/update/{id}', [ReportsController::class, 'update'])
            ->name('reports.update');
    });
});
