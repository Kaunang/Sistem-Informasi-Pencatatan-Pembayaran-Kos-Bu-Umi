<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DataKamarController;
use App\Http\Controllers\DataPenghuniController;
use App\Http\Controllers\DataTagihanController;
use App\Http\Controllers\PenggunaSistemController;


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'penghuni'])->group(function() {
    Route::controller(UserController::class)->group(function() {
        Route::get('dashboard-user', 'dashboardUser');
        Route::get('profil', 'profilUser')->name('profil.user');
        Route::get('tagihan', 'tagihanUser')->name('tagihan.user');
    });
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('Dashboard', [DashboardAdminController::class, 'index']);

    Route::get('Data-Kamar', [DataKamarController::class, 'index'])->name('admin.DataKamar.index');
    Route::get('tambah-datakamar', [DataKamarController::class, 'create'])->name('admin.DataKamar.create');
    Route::post('Data-Kamar', [DataKamarController::class, 'store'])->name('admin.DataKamar.store');
    Route::get('/data-kamar/edit/{id}', [DataKamarController::class, 'edit'])->name('admin.DataKamar.edit');
    Route::post('/data-kamar/edit/{id}', [DataKamarController::class, 'update'])->name('admin.DataKamar.update');
    Route::post('/data-kamar/delete/{id}', [DataKamarController::class, 'destroy'])->name('admin.DataKamar.delete');

    Route::get('Data-Penghuni', [DataPenghuniController::class, 'index']);
    Route::get('Tambah-Penghuni', [DataPenghuniController::class, 'create'])->name('admin.DataPenghuni.create');
    Route::post('Data-Penghuni', [DataPenghuniController::class, 'store'])->name('admin.DataPenghuni.store');
    Route::get('/penghuni/edit/{id}', [DataPenghuniController::class, 'edit'])->name('admin.DataPenghuni.edit');
    Route::post('/penghuni/edit/{id}', [DataPenghuniController::class, 'update'])->name('admin.DataPenghuni.update');
    Route::post('/penghuni/delete/{id}', [DataPenghuniController::class, 'destroy'])->name('admin.DataPenghuni.delete');    
    Route::get('/detail/penghuni/{id}', [DataPenghuniController::class, 'detail'])->name('admin.DataPenghuni.detail');

    Route::get('Data-Tagihan', [DataTagihanController::class, 'index']);
    Route::get('Data-pembayaran', [DataTagihanController::class, 'data']);
    Route::get('tambah-pembayaran', [DataTagihanController::class, 'create']);
    Route::get('Pembayaran-Lunas', [DataTagihanController::class, 'lunas']);
    Route::post('Data-Tagihan', [DataTagihanController::class, 'store']);
    Route::post('/update-pembayaran/{id}', [DataTagihanController::class, 'update'])->name('updatePembayaran');

    Route::get('Laporan-Keuangan', [DataTagihanController::class, 'laporan']);

    Route::get('Pengguna-Sistem', [PenggunaSistemController::class, 'index'])->name('admin.PenggunaSistem.index'); 
    Route::get('Tambah-PenggunaSistem', [PenggunaSistemController::class, 'create'])->name('admin.PenggunaSistem.create');
    Route::post('Pengguna-Sistem', [PenggunaSistemController::class, 'store'])->name('admin.PenggunaSistem.store');
    Route::get('/pengguna-sistem/edit/{username}', [PenggunaSistemController::class, 'edit'])->name('admin.PenggunaSistem.edit');
    Route::post('/pengguna-sistem/edit/{username}', [PenggunaSistemController::class, 'update'])->name('admin.PenggunaSistem.update');
    Route::post('/pengguna-sistem/delete/{username}', [PenggunaSistemController::class, 'destroy'])->name('admin.PenggunaSistem.delete');
});



use Illuminate\Support\Facades\DB;

Route::get('/cek-database', function () {
    try {
        DB::connection()->getPdo();
        return "Koneksi ke database berhasil.";
    } catch (\Exception $e) {
        return "Koneksi ke database gagal: " . $e->getMessage();
    }
});
