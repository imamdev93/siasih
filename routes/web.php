<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalMengajarController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('beranda', BerandaController::class)->name('beranda')->middleware(['auth:admin,guru,siswa']);

Route::prefix('informasi')->group(function () {
    Route::resource('kurikulum', KurikulumController::class)->middleware(['auth:admin,guru']);
    Route::get('absensi', [AbsensiController::class, 'index'])->middleware(['auth:siswa']);
    Route::get('nilai', [NilaiController::class, 'index'])->middleware(['auth:siswa']);
    Route::get('jadwal-mengajar', [JadwalMengajarController::class, 'index'])->middleware(['auth:admin,guru,siswa'])->name('jadwal.index');
    Route::get('jadwal-mengajar/tambah', [JadwalMengajarController::class, 'create'])->middleware(['auth:admin,guru,siswa'])->name('jadwal.create');
    Route::post('jadwal-mengajar/tambah', [JadwalMengajarController::class, 'store'])->middleware(['auth:admin,guru,siswa'])->name('jadwal.store');
    Route::get('jadwal-mengajar/{id}', [JadwalMengajarController::class, 'edit'])->middleware(['auth:admin'])->name('jadwal.edit');
    Route::post('jadwal-mengajar/{id}', [JadwalMengajarController::class, 'update'])->middleware(['auth:admin'])->name('jadwal.update');
    Route::get('jadwal-mengajar/{id}/detail', [JadwalMengajarController::class, 'show'])->middleware(['auth:admin'])->name('jadwal.show');
    Route::get('jadwal-pelajaran', [JadwalMengajarController::class, 'index'])->middleware(['auth:admin,siswa']);
});

Route::prefix('pengaturan')->group(function () {
    Route::get('biodata', [BiodataController::class, 'show'])->middleware(['auth:admin,guru,siswa'])->name('biodata.show');
    Route::post('biodata', [BiodataController::class, 'update'])->middleware(['auth:admin,guru,siswa'])->name('biodata.update');

    Route::get('ubah-password', [AuthController::class, 'show'])->middleware(['auth:admin,guru,siswa'])->name('password.show');
    Route::post('ubah-password', [AuthController::class, 'update'])->middleware(['auth:admin,guru,siswa'])->name('password.update');
});

Route::prefix('layanan')->group(function () {
    Route::resource('semester', SemesterController::class)->middleware(['auth:admin']);
    Route::resource('guru', GuruController::class)->middleware(['auth:admin']);
    Route::resource('siswa', SiswaController::class)->middleware(['auth:admin']);
    Route::resource('absensi', AbsensiController::class)->middleware(['auth:admin,guru']);
    Route::post('absensi/all', [AbsensiController::class, 'storeAll'])->middleware(['auth:admin,guru'])->name('absensi.all');
    Route::resource('nilai', NilaiController::class)->middleware(['auth:admin,guru']);
    Route::get('konsultasi/akademik', [KonsultasiController::class, 'index'])->middleware(['auth:guru,siswa'])->name('konsultasi.index');
    Route::get('konsultasi/akademik/tambah', [KonsultasiController::class, 'create'])->middleware(['auth:guru,siswa'])->name('konsultasi.create');
    Route::post('konsultasi/akademik/tambah', [KonsultasiController::class, 'store'])->middleware(['auth:guru,siswa'])->name('konsultasi.store');
    Route::get('konsultasi/{id}/feedback', [KonsultasiController::class, 'feedback'])->middleware(['auth:guru,siswa'])->name('konsultasi.feedback');
    Route::post('konsultasi/{id}/feedback', [KonsultasiController::class, 'storeFeedback'])->middleware(['auth:guru,siswa'])->name('konsultasi.storeFeedback');

    Route::get('konsultasi/non-akademik', [KonsultasiController::class, 'indexNonAkademik'])->middleware(['auth:guru,siswa'])->name('konsultasi.nonAkademik.index');
    Route::get('konsultasi/non-akademik/tambah', [KonsultasiController::class, 'createNonAkademik'])->middleware(['auth:guru,siswa'])->name('konsultasi.nonAkademik.create');
    Route::post('konsultasi/non-akademik/tambah', [KonsultasiController::class, 'storeNonAkademik'])->middleware(['auth:guru,siswa'])->name('konsultasi.nonAkademik.store');
    Route::get('konsultasi/{id}/non-akademik/feedback', [KonsultasiController::class, 'feedbackNonAkademik'])->middleware(['auth:guru,siswa'])->name('konsultasi.nonAkademik.feedback');
    Route::post('konsultasi/{id}/non-akademik/feedback', [KonsultasiController::class, 'storeFeedbackNonAkademik'])->middleware(['auth:guru,siswa'])->name('konsultasi.nonAkademik.storeFeedback');

    Route::get('raport', [RaportController::class, 'index'])->middleware(['auth:admin,guru,siswa'])->name('raport.index');
    Route::get('grafik', [SiswaController::class, 'grafik'])->middleware(['auth:admin,guru,siswa'])->name('grafik.index');
});

Route::prefix('laporan')->group(function () {
    Route::get('harian', [LaporanController::class, 'dailyReport'])->middleware(['auth:admin,guru']);
    Route::get('mingguan', [LaporanController::class, 'weeklyReport'])->middleware(['auth:admin,guru']);
    Route::get('bulanan', [LaporanController::class, 'monthlyReport'])->middleware(['auth:admin,guru']);
    Route::get('semesteran', [LaporanController::class, 'semesterReport'])->middleware(['auth:admin,guru']);
});

Route::prefix('arsip')->middleware(['auth:admin,guru,siswa'])->group(function () {
    Route::get('absensi', [ArsipController::class, 'absensi']);
    Route::get('nilai', [ArsipController::class, 'nilai']);
});

Route::get('run:migration', function () {
    Artisan::call('migrate');
    return 'run migration successfully';
});
