<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UbahInformasiSidangController;
use App\Http\Controllers\MahasiswaPendaftaranSidangController;
use App\Http\Controllers\AdminDaftarSidangMahasiswaController;
use App\Http\Controllers\AdminHasilNilaiSidangController;
use App\Http\Controllers\KoorProdiJadwalSidangMahasiswaController;
use App\Http\Controllers\PembimbingNilaiSidangController;
use App\Http\Controllers\PengujiNilaiSidangController;
use App\Http\Controllers\MahasiswaStatusPendaftaranController;
use App\Http\Controllers\MahasiswaHasilSidangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::get('/sign-in', [AuthController::class, 'showSignIn'])->name('signIn');
Route::post('/sign-in', [AuthController::class, 'signIn']);
Route::post('/sign-out', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // Mahasiswa
    Route::middleware('role:Mahasiswa')->group(function () {
        Route::get('/', function () {
            return view('user.pages.beranda.index');
        });
        Route::get('/ketentuan-dan-syarat-sidang', function () {
            return view('user.pages.layanan.ketentuan-dan-syarat');
        });
        Route::get('/informasi-sidang', function () {
            return view('user.pages.layanan.informasi-sidang');
        });
        Route::get('/alur-pengajuan-judul-sidang', function () {
            return view('user.pages.layanan.alur-pengajuan-judul-sidang');
        });
        Route::get('/pendaftaran-sidang', function () {
            return view('user.pages.layanan.pendaftaran-sidang');
        });
        Route::post('/pendaftaran-sidang', [MahasiswaPendaftaranSidangController::class, 'store'])->name('pendaftaran-sidang.store');

        Route::get('/status-dan-hasil-pendaftaran', function () {
            return view('user.pages.layanan.status-dan-hasil-pendaftaran');
        });
        Route::get('/status-dan-hasil-pendaftaran', [MahasiswaStatusPendaftaranController::class, 'index'])->name('index');

        Route::get('/hasil-dan-nilai-sidang', [MahasiswaHasilSidangController::class, 'index'])->name('hasil-nilai-sidang');
    });

    // Admin
    Route::middleware('role:Admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin.pages.beranda.index');
        });
        Route::get('/admin/daftar-data-dokumen-mahasiswa', [AdminDaftarSidangMahasiswaController::class, 'index'])->name('admin.daftar-sidang');
        Route::get('/admin/daftar-data-dokumen-mahasiswa/{id}', [AdminDaftarSidangMahasiswaController::class, 'show'])->name('admin.detail-berkas-mahasiswa');
        Route::post('/admin/daftar-data-dokumen-mahasiswa/{id}/kirim-ke-koor', [AdminDaftarSidangMahasiswaController::class, 'store'])->name('kirim.ke.koor');

        // Route::get('/admin/hasil-dan-nilai-sidang-mahasiswa', [AdminHasilNilaiSidangController::class, 'index'])->name('admin.hasil-nilai-sidang');

        // Route::get('/admin/hasil-dan-nilai-sidang-mahasiswa/input-nilai', function () {
        //     return view('admin.pages.layanan.hasil-dan-nilai-sidang-mahasiswa.input-nilai.index');
        // });

        // Route::get('/admin/hasil-dan-nilai-sidang-mahasiswa/input-nilai/{id}', [AdminHasilNilaiSidangController::class, 'formInput'])->name('admin.input-nilai');
        // Route::post('/admin/hasil-dan-nilai-sidang-mahasiswa/input-nilai/simpan/{id}', [AdminHasilNilaiSidangController::class, 'store'])->name('nilai-sidang.store');

        Route::get('/admin/informasi-sidang', function () {
            return view('admin.pages.layanan.informasi-sidang.index');
        });
        Route::post('/admin/informasi-sidang/ubah-informasi-sidang', [UbahInformasiSidangController::class, 'upload'])->name('ubah.informasi');
    });

    // Koor-Prodi
    Route::middleware('role:Koordinator Program Studi')->group(function () {
        Route::get('/koor-prodi', function () {
            return view('koor-prodi.pages.beranda.index');
        });
        Route::get('/koor-prodi/ketersediaan-dosen-penguji', function () {
            return view('koor-prodi.pages.layanan.ketersediaan-dosen-penguji.index');
        });
        Route::get('/koor-prodi/ketersediaan-dosen-penguji/s1-sistem-informasi', function () {
            return view('koor-prodi.pages.layanan.ketersediaan-dosen-penguji.prodi.s1-sistem-informasi');
        });
        Route::get('/koor-prodi/ketersediaan-dosen-penguji/d3-sistem-informasi', function () {
            return view('koor-prodi.pages.layanan.ketersediaan-dosen-penguji.prodi.d3-sistem-informasi');
        });
        Route::get('/koor-prodi/ketersediaan-dosen-penguji/s1-informatika', function () {
            return view('koor-prodi.pages.layanan.ketersediaan-dosen-penguji.prodi.s1-informatika');
        });
        Route::get('/koor-prodi/ketersediaan-dosen-penguji/s1-sains-data', function () {
            return view('koor-prodi.pages.layanan.ketersediaan-dosen-penguji.prodi.s1-sains-data');
        });

        Route::get('/koor-prodi/jadwal-sidang-mahasiswa', [KoorProdiJadwalSidangMahasiswaController::class, 'index'])->name('koor-prodi.jadwal-sidang');

        Route::get('/koor-prodi/jadwal-sidang-mahasiswa/input-jadwal-sidang-mahasiswa/{id}', [KoorProdiJadwalSidangMahasiswaController::class, 'input']);

        Route::post('/koor-prodi/jadwal-sidang-mahasiswa/input-jadwal-sidang-mahasiswa/kirim/{id}', [KoorProdiJadwalSidangMahasiswaController::class, 'kirim'])->name('jadwal.sidang.kirim');

    });

    // Pembimbing
    Route::middleware('role:Dosen Penguji')->group(function () {
        Route::get('/penguji', function () {
            return view('penguji.pages.beranda.index');
        });
        Route::get('/penguji/nilai-sidang-mahasiswa', [PengujiNilaiSidangController::class, 'index'])->name('penguji.nilai-sidang-mahasiswa');

        Route::get('/penguji/nilai-sidang-mahasiswa/input-nilai/{id}', [PengujiNilaiSidangController::class, 'formInput'])->name('penguji.input-nilai');
        Route::post('/penguji/nilai-sidang-mahasiswa/input-nilai/simpan/{id}', [PengujiNilaiSidangController::class, 'store'])->name('penguji.nilai-sidang.store');

    });

    Route::middleware('role:Dosen Pembimbing')->group(function () {
        Route::get('/pembimbing', function () {
            return view('pembimbing.pages.beranda.index');
        });
        Route::get('/pembimbing/nilai-sidang-mahasiswa', [PembimbingNilaiSidangController::class, 'index'])->name('pembimbing.nilai-sidang-mahasiswa');

        Route::get('/pembimbing/nilai-sidang-mahasiswa/input-nilai/{id}', [PembimbingNilaiSidangController::class, 'formInput'])->name('pembimbing.input-nilai');

        Route::post('/pembimbing/nilai-sidang-mahasiswa/input-nilai/simpan/{id}', [PembimbingNilaiSidangController::class, 'store'])->name('pembimbing.nilai-sidang.store');

    });

    Route::get('/debug-user', function () {
        return auth()->user();
    });

});