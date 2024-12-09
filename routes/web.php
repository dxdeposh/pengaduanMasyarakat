<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TestimoniController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('pengaduan', PengaduanController::class);
Route::put('/pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
Route::get('pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');

// Tampilkan form untuk menambah testimoni
Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('testimoni.create');

// Simpan testimoni baru
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

require __DIR__ . '/auth.php';
