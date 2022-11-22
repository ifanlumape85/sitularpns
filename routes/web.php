<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DetailUserController;
use App\Http\Controllers\Admin\GolonganController;
use App\Http\Controllers\Admin\JenjangPendidikanController;
use App\Http\Controllers\Admin\PersyaratanController;
use App\Http\Controllers\Admin\PersyaratanUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RegistrasiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SkpdController;
use App\Http\Controllers\Admin\UjianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('auth.login');
})->name('home');

Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/detail/{ujian:id}/ujian', [UjianController::class, 'show'])->name('detail-ujian');
    Route::get('/daftar/ujian', [UjianController::class, 'create'])->name('daftar-ujian');
    Route::get('/cetak/{registrasi:id}/bukti-pendaftaran', [RegistrasiController::class, 'pdf'])->name('cetak-registrasi');
    Route::resource('profile', ProfileController::class);
    Route::resource('detail_user', DetailUserController::class);
    Route::resource('golongan', GolonganController::class);
    Route::resource('jenjang_pendidikan', JenjangPendidikanController::class);
    Route::resource('persyaratan', PersyaratanController::class);
    Route::resource('ujian', UjianController::class);
    Route::resource('registrasi', RegistrasiController::class);
    Route::resource('skpd', SkpdController::class);
    Route::resource('berkas', PersyaratanUserController::class);
    Route::resource('user', UserController::class);
    Route::resource('roles', RoleController::class);
});
