<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DetailUserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GolonganController;
use App\Http\Controllers\Admin\JenjangPendidikanController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PerizinanController;
use App\Http\Controllers\Admin\PersyaratanController;
use App\Http\Controllers\Admin\PersyaratanUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProfilePictureController;
use App\Http\Controllers\Admin\RegistrasiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SkpdController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UjianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DetailPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoreController;
use App\Http\Requests\Admin\PersyaratanRequest;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [HomeController::class, 'event'])->name('events');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/ujian', [HomeController::class, 'ujian'])->name('ujian');
Route::get('/ujian/{ujian:slug}', [DetailPageController::class, 'ujian'])->name('detail-ujian');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [DetailPageController::class, 'news'])->name('detail-news');
Route::get('/page/{slug}', [DetailPageController::class, 'index'])->name('detail-page');
Route::get('/category/{category:slug}', [DetailPageController::class, 'category'])->name('category');
Route::get('/tag/{tag:slug}', [DetailPageController::class, 'tag'])->name('tag');
Route::get('/event/{event:slug}', [DetailPageController::class, 'event'])->name('event');
Route::get('/information/{information:slug}', [DetailPageController::class, 'information'])->name('information');

Route::prefix('search')->group(function () {
    Route::post('/result', [SearchController::class, 'news'])->name('search');
});

Route::prefix('guest')->group(function () {
    Route::post('/contact/store', [StoreController::class, 'contact'])->name('contact-store');
});

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
    // Route::resource('perizinan', PerizinanController::class);
    Route::resource('profile_picture', ProfilePictureController::class);
    Route::resource('slide', SlideController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('page', PageController::class);
    Route::resource('event', EventController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('news', NewsController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('user', UserController::class);
    Route::resource('roles', RoleController::class);
});
