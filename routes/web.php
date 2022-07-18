<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KurikulumController;
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
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('beranda', BerandaController::class)->name('beranda')->middleware(['auth:admin,guru,siswa']);

Route::prefix('informasi')->group(function() {
    Route::resource('kurikulum', KurikulumController::class)->middleware(['auth:admin,guru']);
});

Route::prefix('pengaturan')->group(function() {
    Route::get('biodata', [BiodataController::class, 'show'])->middleware(['auth:admin,guru,siswa'])->name('biodata.show');
    Route::post('biodata', [BiodataController::class, 'update'])->middleware(['auth:admin,guru,siswa'])->name('biodata.update');

    Route::get('ubah-password', [AuthController::class, 'show'])->middleware(['auth:admin,guru,siswa'])->name('password.show');
    Route::post('ubah-password', [AuthController::class, 'update'])->middleware(['auth:admin,guru,siswa'])->name('password.update');
});

Route::prefix('layanan')->group(function() {
    Route::resource('guru', GuruController::class)->middleware(['auth:admin']);
});
