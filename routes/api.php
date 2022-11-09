<?php

use App\Http\Controllers\Api\DetailUserController;
use App\Http\Controllers\Api\GolonganController;
use App\Http\Controllers\Api\JenjangPendidikanController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PersyaratanController;
use App\Http\Controllers\Api\PersyaratanUserController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegistrasiController;
use App\Http\Controllers\Api\SkpdController;
use App\Http\Controllers\Api\UjianController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Auth::routes(['verify' => true]);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'store']);
Route::post('change_profile', [UserController::class, 'update']);
Route::post('change_password', [UserController::class, 'changePassword']);
Route::post('lupa_password', [UserController::class, 'lupaPassword']);
Route::post('upload_berkas', [PersyaratanUserController::class, 'store']);
Route::post('berkas', [PersyaratanUserController::class, 'index']);
Route::post('ujians', [UjianController::class, 'index']);
Route::post('detail_users', [DetailUserController::class, 'index']);
Route::post('pengajuan', [RegistrasiController::class, 'store']);
Route::post('news', [NewsController::class, 'index']);
Route::post('last_news', [NewsController::class, 'lastNews']);
Route::post('profile', [ProfileController::class, 'index']);
Route::post('jenjang_pendidikans', [JenjangPendidikanController::class, 'index']);
Route::post('all_jenjang_pendidikan', [JenjangPendidikanController::class, 'all']);
Route::post('golongans', [GolonganController::class, 'index']);
Route::post('all_golongan', [GolonganController::class, 'all']);
Route::post('skpds', [SkpdController::class, 'index']);
Route::post('all_skpd', [SkpdController::class, 'all']);
Route::post('persyaratans', [PersyaratanController::class, 'index']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
