<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', function () { return view('admin.dashboard'); });
Route::get('/admin/laporan', function () { return view('admin.laporan'); });
Route::get('/admin/pengguna-sistem', function () { return view('admin.pengguna-sistem'); });
Route::get('/admin/kelola-hak-akses', function () { return view('admin.kelola-hak-akses'); });
Route::get('/admin/aktifitas-group', function () { return view('admin.aktifitas-group'); });
Route::get('/admin/aktifitas-usul', function () { return view('admin.aktifitas-usul'); });

Route::get('/member/dashboard', function () { return view('member.dashboard'); });
Route::get('/member/kinerja', function () { return view('member.kinerja'); });
Route::get('/member/form-laporan', function () { return view('member.form-laporan'); });
Route::get('/member/laporan', function () { return view('member.laporan'); });

Route::get('/validator/dashboard', function () { return view('validator.dashboard'); });
Route::get('/validator/validasi-laporan', function () { return view('validator.validasi-laporan'); });
Route::get('/validator/laporan', function () { return view('validator.laporan'); });
Route::get('/validator/kinerja', function () { return view('validator.kinerja'); });

Route::get('/verifikator/dashboard', function () { return view('verifikator.dashboard'); });
Route::get('/verifikator/laporan', function () { return view('verifikator.laporan'); });
Route::get('/verifikator/kinerja', function () { return view('verifikator.kinerja'); });
Route::get('/verifikator/verifikasi-laporan', function () { return view('verifikator.verifikasi-laporan'); });