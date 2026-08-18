<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ActivityLogController;

// Landing Page
Route::get('/', function () {
    return view('surat.landing');
})->name('landing');

// Group Route Terautentikasi (Breeze Auth)
Route::middleware(['auth'])->group(function () {

    // Semua user terautentikasi (Admin & Guest) bisa melihat daftar surat
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');

    // Alias agar Breeze tidak error saat mencari route 'dashboard'
    Route::get('/dashboard', [SuratController::class, 'index'])->name('dashboard');

    // Halaman terpisah: Surat Masuk & Surat Keluar
    Route::get('/surat-masuk', [SuratController::class, 'masuk'])->name('surat.masuk');
    Route::get('/surat-keluar', [SuratController::class, 'keluar'])->name('surat.keluar');

    // Khusus Admin yang punya hak akses penuh (Cetak, Tambah, Edit, Hapus)
    Route::middleware(['admin'])->group(function () {
        Route::get('/surat/{id}/cetak', [SuratController::class, 'cetak'])->name('surat.cetak');
        Route::get('/surat/{id}/pdf', [SuratController::class, 'pdf'])->name('surat.pdf');
        Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
        Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
        Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');
        Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');
        Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
    });

});

// Langkah 5.8 LKPD: Route Log Aktivitas, dibungkus middleware 'admin' agar tidak bisa diakses guest
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/log-aktivitas', [ActivityLogController::class, 'index'])->name('log.index');
});

require __DIR__.'/auth.php';