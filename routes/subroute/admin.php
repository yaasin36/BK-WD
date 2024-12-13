<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\PasienController;

Route::prefix("/admin")->middleware("auth_admin")->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/login', [AdminController::class, 'getLogin'])->withoutMiddleware("auth_admin");
    Route::post('/login', [AdminController::class, 'postLogin'])->withoutMiddleware("auth_admin");

    Route::prefix("/obat")->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('obat.index');
        Route::get('/create', [ObatController::class, 'create'])->name('obat.create');
        Route::post('/create', [ObatController::class, 'store']);
        Route::get('/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit')->where('id', '[0-9]+');
        Route::post('/{id}/edit', [ObatController::class, 'update']);
        Route::get('/{id}/delete', [ObatController::class, 'destroy'])->name('obat.destroy')->where('id', '[0-9]+');
    });

    Route::prefix("/dokter")->group(function () {
        Route::get('/', [DokterController::class, 'index'])->name('dokter.index');
        Route::get('/create', [DokterController::class, 'create'])->name('dokter.create');
        Route::post('/create', [DokterController::class, 'store']);
        Route::get('/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit')->where('id', '[0-9]+');
        Route::post('/{id}/edit', [DokterController::class, 'update']);
        Route::get('/{id}/delete', [DokterController::class, 'destroy'])->name('dokter.destroy')->where('id', '[0-9]+');
    });

    Route::prefix("/poliklinik")->group(function () {
        Route::get('/', [PoliklinikController::class, 'index'])->name('poliklinik.index');
        Route::get('/create', [PoliklinikController::class, 'create'])->name('poliklinik.create');
        Route::post('/create', [PoliklinikController::class, 'store']);
        Route::get('/{id}/edit', [PoliklinikController::class, 'edit'])->name('poliklinik.edit')->where('id', '[0-9]+');
        Route::post('/{id}/edit', [PoliklinikController::class, 'update']);
        Route::get('/{id}/delete', [PoliklinikController::class, 'destroy'])->name('poliklinik.destroy')->where('id', '[0-9]+');
    });

    // Tambahkan routing untuk Pasien
    Route::prefix("/pasien")->group(function () {
        Route::get('/', [PasienController::class, 'index'])->name('admin.pasien.index'); // Menampilkan data pasien
        Route::get('/create', [PasienController::class, 'create'])->name('admin.pasien.create'); // Menampilkan form tambah pasien
        Route::post('/create', [PasienController::class, 'store'])->name('admin.pasien.store'); // Proses simpan data pasien
        Route::get('/{id}/edit', [PasienController::class, 'edit'])->name('admin.pasien.edit')->where('id', '[0-9]+'); // Menampilkan form edit pasien
        Route::post('/{id}/update', [PasienController::class, 'update'])->name('admin.pasien.update'); // Proses update data pasien
        Route::get('/{id}/delete', [PasienController::class, 'destroy'])->name('admin.pasien.delete')->where('id', '[0-9]+'); // Proses hapus data pasien
    });    
     
});
