<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PasienController;


Route::prefix('/pasien')->middleware('auth_pasien')->group(function () {
    Route::get('/', [PasienController::class, 'dashboard'])->name('pasien.dashboard');
    Route::get('/detail/{id}', [PasienController::class, 'detail'])->name('pasien.detail');

    // Rute tanpa middleware auth_pasien
    Route::withoutMiddleware('auth_pasien')->group(function () {
        Route::get('/login', [PasienController::class, 'getLogin'])->name('pasien.login');
        Route::post('/login', [PasienController::class, 'postLogin'])->name('pasien.login.post');
        Route::get('/register', [PasienController::class, 'getRegister'])->name('pasien.register');
        Route::post('/register', [PasienController::class, 'postRegister'])->name('pasien.store');
    });
    

    // Rute antrian
    Route::prefix('/antrian')->group(function () {
        Route::get('/', [AntrianController::class, 'index'])->name('pasien.antrian.index');
        Route::get('/{id}/cek-jadwal', [AntrianController::class, 'cekJadwal'])->name('pasien.antrian.cekJadwal');
    });

    // Rute jadwal
    Route::prefix('/jadwal')->group(function () {
        Route::get('/{id}/appointment', [AppointmentController::class, 'create'])->name('pasien.jadwal.appointment.create');
        Route::post('/{id}/appointment', [AppointmentController::class, 'store'])->name('pasien.jadwal.appointment.store');
    });
});
