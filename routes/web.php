<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinGuruController;
use App\Http\Controllers\IzinSiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/izin-guru', [IzinGuruController::class, 'index'])->name('izin-guru.index');
    Route::get('/izin-siswa', [IzinSiswaController::class, 'index'])->name('izin-siswa.index');
    Route::get('/izin-siswa/create', [IzinSiswaController::class, 'create'])->name('izin-siswa.create');
    Route::post('/izin-siswa', [IzinSiswaController::class, 'store'])->name('izin-siswa.store');
    Route::post('/izin-siswa/{izinSiswa}/status/{statusId}', [IzinSiswaController::class, 'update'])
        ->name('izin-siswa.update_status');
    Route::get('/get-siswa-by-kelas/{kelas}', [IzinSiswaController::class, 'getSiswaByKelas']);
});

require __DIR__ . '/auth.php';
