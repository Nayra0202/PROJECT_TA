<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarHargaController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\SuratJalanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Resource route untuk menu utama
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('harga', DaftarHargaController::class);
    Route::resource('barang-masuk', BarangMasukController::class);
    Route::resource('permintaan', PermintaanController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);
    Route::resource('surat-jalan', SuratJalanController::class); // gunakan dash, bukan underscore
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



