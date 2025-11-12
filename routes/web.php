<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinGuruController;
use App\Http\Controllers\IzinSiswaController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin-piket')->group(function () {
        Route::get('/izin-guru', [IzinGuruController::class, 'index'])->name('izin-guru.index');
        Route::get('/izin-guru/create', [IzinGuruController::class, 'create'])->name('izin-guru.create');
        Route::post('/izin-guru', [IzinGuruController::class, 'store'])->name('izin-guru.store');
        Route::post('/izin-guru/{izinGuru}/status/{statusId}', [IzinGuruController::class, 'update'])
            ->name('izin-guru.update_status');
        Route::get('/izin-siswa', [IzinSiswaController::class, 'index'])->name('izin-siswa.index');
        Route::get('/izin-siswa/create', [IzinSiswaController::class, 'create'])->name('izin-siswa.create');
        Route::post('/izin-siswa', [IzinSiswaController::class, 'store'])->name('izin-siswa.store');
        Route::post('/izin-siswa/{izinSiswa}/status/{statusId}', [IzinSiswaController::class, 'update'])
            ->name('izin-siswa.update_status');
        Route::get('/get-siswa-by-kelas/{kelas}', [IzinSiswaController::class, 'getSiswaByKelas']);
        Route::get('/alpha', [IzinSiswaController::class, 'indexAlpha'])->name('alpha.index');
        Route::get('/alpha-siswa/create', [IzinSiswaController::class, 'createAlpha'])->name('alpha-siswa.create');
        Route::post('/alpha-siswa', [IzinSiswaController::class, 'storeAlpha'])->name('alpha-siswa.store');
        
      
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/izin', [IzinSiswaController::class, 'indexBySiswa'])->name('siswa.izin.index');
        Route::get('/izin/create', [IzinSiswaController::class, 'createBySiswa'])->name('siswa.izin.create');
        Route::post('/izin', [IzinSiswaController::class, 'storeBySiswa'])->name('siswa.izin.store');
    });
    Route::prefix('guru')->group(function () {
        Route::get('/izin', [IzinGuruController::class, 'indexByGuru'])->name('guru.izin.index');
        Route::get('/izin/create', [IzinGuruController::class, 'createByGuru'])->name('guru.izin.create');
        Route::post('/izin', [IzinGuruController::class, 'storeByGuru'])->name('guru.izin.store');
    });
    Route::prefix('wali-kelas')->group(function () {
        Route::get('/izin', [IzinSiswaController::class, 'indexByWaliKelas'])->name('waliKelas.izin.index');
        Route::post('/izin-siswa/{izinSiswa}/status/{statusId}', [IzinSiswaController::class, 'updateByWaliKelas'])
            ->name('izin-siswaByWaliKelas.update_status');
    });


});

require __DIR__ . '/auth.php';
