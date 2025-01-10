<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LowonganPekerjaanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\LamarController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Halaman daftar lowongan pekerjaan
    Route::get('/lowongan', [LowonganPekerjaanController::class, 'index'])->name('lowongan.index');

    // Halaman untuk membuat lowongan pekerjaan
    Route::get('/lowongan/create', [LowonganPekerjaanController::class, 'create'])->name('lowongan.create');

    
    // Menyimpan lowongan pekerjaan yang baru dibuat
    Route::post('/lowongan', [LowonganPekerjaanController::class, 'store'])->name('lowongan.store');

// Rute untuk menampilkan halaman edit (GET)
Route::get('/lowongan/{id}/edit', [LowonganPekerjaanController::class, 'edit'])->name('lowongan.edit');

// Rute untuk memperbarui lowongan (PUT)
Route::put('/lowongan/{id}', [LowonganPekerjaanController::class, 'update'])->name('lowongan.update');


Route::get('lowongan/{id}', [LowonganPekerjaanController::class, 'show'])->name('lowongan.show');

    // Menghapus lowongan pekerjaan
    Route::delete('/lowongan/{id}', [LowonganPekerjaanController::class, 'destroy'])->name('lowongan.destroy');
});

Route::middleware('auth')->group(function () {
    // Halaman untuk mendaftar perusahaan
    Route::get('/perusahaan/create', [PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::post('/perusahaan', [PerusahaanController::class, 'store'])->name('perusahaan.store');
    
    // Halaman untuk edit perusahaan
    Route::get('perusahaan/{id}/edit', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');

    // Update data perusahaan
    Route::put('/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
    // Hapus perusahaan
    Route::delete('/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
});


// Rute untuk dashboard
Route::middleware('auth')->group(function () {
    // Dashboard untuk user dan perusahaan
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Hanya akses perusahaan yang sudah terdaftar untuk menuju dashboard perusahaan
    Route::get('/dashboard/perusahaan', [DashboardController::class, 'perusahaan'])->name('dashboard.perusahaan');
});

// Rute untuk profil pengguna (opsional, bisa dipertahankan jika ada kebutuhan untuk mengubah data profil)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/resumes', [ResumeController::class, 'index'])->name('resume.index');
    Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
    Route::post('/resumes', [ResumeController::class, 'store'])->name('resume.store');
});



Route::middleware('auth')->group(function () {
    // Rute untuk membuat pertanyaan baru
    // Menambahkan route untuk melihat form pertanyaan berdasarkan lowongan
Route::get('/lowongan/{lowongan_id}/pertanyaan/create', [PertanyaanController::class, 'create'])->name('pertanyaan.create');

    Route::post('/pertanyaan', [PertanyaanController::class, 'store'])->name('pertanyaan.store');

    Route::get('/pertanyaan', [LowonganPekerjaanController::class, 'index'])->name('pertanyaan.index');
});



Route::middleware('auth')->group(function () {
    // Rute untuk resource Lamar
    Route::get('/lamar', [LamarController::class, 'index'])->name('lamar.index'); // Menampilkan daftar lamaran
    Route::get('/lowongan/{lowongan_id}/lamar/create', [LamarController::class, 'create'])->name('lamar.create'); // Form lamaran baru
    Route::post('/lamar', [LamarController::class, 'store'])->name('lamar.store'); // Menyimpan lamaran baru
    Route::get('/lamar/{lamar}', [LamarController::class, 'show'])->name('lamar.show'); // Menampilkan detail lamaran
    Route::get('/lamar/{lamar}/edit', [LamarController::class, 'edit'])->name('lamar.edit'); // Form edit lamaran
    Route::put('/lamar/{lamar}', [LamarController::class, 'update'])->name('lamar.update'); // Update lamaran
    Route::delete('/lamar/{lamar}', [LamarController::class, 'destroy'])->name('lamar.destroy'); // Hapus lamaran
});




// Rute utama (landing page)
Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
