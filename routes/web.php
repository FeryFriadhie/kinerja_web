<?php

use App\Models\DataPegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\StakeholderController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\AktifitasGroupController;
use App\Http\Controllers\LaporanKinerjaController;
use App\Http\Controllers\AktifitasUsulanController;
use App\Http\Controllers\ValidasiLaporanController;
use App\Http\Controllers\VerifikasiLaporanController;


Auth::routes();

Route::get('/', function () {return view('welcome');});
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ROUTE MEMBER
Route::middleware(['auth:pegawai,admin','user-role:Member'])->group(function()
{
    Route::get('/member/dashboard', [HomeController::class, 'userMember'])->name('member.dashboard');

    Route::get('/member/kinerja', [KinerjaController::class, 'index'])->name('member.kinerja.index');
    Route::get('/member/kinerja/buat-laporan', [KinerjaController::class, 'create'])->name('member.kinerja.create');
    Route::post('/member/kinerja/tambah', [KinerjaController::class, 'store'])->name('member.kinerja.store');
    Route::patch('/member/kinerja/ubah/{id}', [KinerjaController::class, 'update'])->name('member.kinerja.update');
    Route::delete('/admin/kinerja/hapus/{id}', [KinerjaController::class, 'destroy'])->name('member.kinerja.destroy');

    Route::get('/view-docs/{file}', [KinerjaController::class, 'viewDoc'])->name('view.doc');

    Route::post('get-group', [KinerjaController::class, 'getGroup']);
    Route::post('get-usul', [KinerjaController::class, 'getUsul']);
    Route::get('/member/laporan', [LaporanKinerjaController::class, 'index'])->name('member.laporan.index');
});

// ROUTE VERIFIKATOR
Route::middleware(['auth:pegawai,admin','user-role:Verifikator'])->group(function()
{
    Route::get("/verifikator/dashboard", [HomeController::class, 'userVerifikator'])->name('verifikator.dashboard');
    Route::get('/verifikator/verifikasi-laporan', [VerifikasiLaporanController::class, 'index'])->name('verifikator.verifikasi-laporan.index');
    Route::post('/verifikator/verifikasi-laporan/store', [VerifikasiLaporanController::class, 'store'])->name('verifikator.verifikasi-laporan.store');
    Route::patch('/verifikator/verifikasi-laporan/update/{id}', [VerifikasiLaporanController::class, 'update'])->name('verifikator.verifikasi-laporan.update');

});

// ROUTE VALIDATOR
Route::middleware(['auth:pegawai,admin','user-role:Validator'])->group(function()
{
    Route::get("/validator/dashboard", [HomeController::class, 'userValidator'])->name('validator.dashboard');
    Route::get('/validator/validasi-laporan', [ValidasiLaporanController::class, 'index'])->name('validator.validasi-laporan.index');
    Route::patch('/validator/validasi-laporan/update/{id}', [ValidasiLaporanController::class, 'update'])->name('validator.validasi-laporan.update');
    // Route::get('/validator/laporan', function () { return view('validator.laporan'); });
    // Route::get('/validator/kinerja', function () { return view('validator.kinerja'); });

});


// ROUTE ADMIN
Route::middleware(['auth:admin','user-role:Administrator'])->group(function()
{
    Route::get("/admin/dashboard", [HomeController::class, 'userAdministrator'])->name('admin.dashboard');
    Route::get('/admin/laporan', function () { return view('admin.laporan'); });

    // master data
    //aktifitas grup
    Route::get('/admin/aktifitas-group', [AktifitasGroupController::class, 'index'])->name('admin.master-data.aktifitas-group.index');
    Route::post('/admin/aktifitas-group/tambah', [AktifitasGroupController::class, 'store'])->name('admin.master-data.aktifitas-group.store');
    Route::patch('/admin/aktifitas-group/ubah/{id}', [AktifitasGroupController::class, 'update'])->name('admin.master-data.aktifitas-group.update');
    Route::delete('/admin/aktifitas-group/hapus/{id}', [AktifitasGroupController::class, 'destroy'])->name('admin.master-data.aktifitas-group.destroy');
    Route::get('/admin/aktifitas-group/export', [AktifitasGroupController::class, 'export'])->name('admin.master-data.aktifitas-group.export');

    //aktifitas usul
    Route::get('/admin/aktifitas-usul', [AktifitasUsulanController::class, 'index'])->name('admin.master-data.aktifitas-usul.index');
    Route::post('/admin/aktifitas-usul/tambah', [AktifitasUsulanController::class, 'store'])->name('admin.master-data.aktifitas-usul.store');
    Route::patch('/admin/aktifitas-usul/ubah/{id}', [AktifitasUsulanController::class, 'update'])->name('admin.master-data.aktifitas-usul.update');
    Route::delete('/admin/aktifitas-usul/hapus/{id}', [AktifitasUsulanController::class, 'destroy'])->name('admin.master-data.aktifitas-usul.destroy');
    Route::get('/admin/aktifitas-usul/export', [AktifitasUsulanController::class, 'export'])->name('admin.master-data.aktifitas-usul.export');

    //data pegawai
    Route::get('/admin/data-pegawai', [DataPegawaiController::class, 'index'])->name('admin.master-data.data-pegawai.index');
    Route::post('/admin/data-pegawai/tambah', [DataPegawaiController::class, 'store'])->name('admin.master-data.data-pegawai.store');
    Route::patch('/admin/data-pegawai/ubah/{id}', [DataPegawaiController::class, 'update'])->name('admin.master-data.data-pegawai.update');
    Route::delete('/admin/data-pegawai/hapus/{id}', [DataPegawaiController::class, 'destroy'])->name('admin.master-data.data-pegawai.destroy');
    Route::post('/admin/pegawai/import', [DataPegawaiController::class, 'import'])->name('admin.master-data.data-pegawai.import');

    // referensi data
    // aspek
    Route::get('/admin/data-aspek', [AspekController::class, 'index'])->name('admin.referensi-data.aspek.index');
    Route::post('/admin/data-aspek/tambah', [AspekController::class, 'store'])->name('admin.referensi-data.aspek.store');
    Route::patch('/admin/data-aspek/ubah/{id}', [AspekController::class, 'update'])->name('admin.referensi-data.aspek.update');
    Route::delete('/admin/data-aspek/hapus/{id}', [AspekController::class, 'destroy'])->name('admin.referensi-data.aspek.destroy');
    Route::patch('/settings/{id}/update/', 'HomeController@update')->name('user.update');
    //stakeholder
    Route::get('/admin/data-stakeholder', [StakeholderController::class, 'index'])->name('admin.referensi-data.stakeholder.index');
    Route::post('/admin/data-stakeholder/tambah', [StakeholderController::class, 'store'])->name('admin.referensi-data.stakeholder.store');
    Route::patch('/admin/data-stakeholder/ubah/{id}', [StakeholderController::class, 'update'])->name('admin.referensi-data.stakeholder.update');
    Route::delete('/admin/data-stakeholder/hapus/{id}', [StakeholderController::class, 'destroy'])->name('admin.referensi-data.stakeholder.destroy');

    //verfikasi
    Route::get('/admin/data-status-verifikasi', [VerifikasiController::class, 'index'])->name('admin.referensi-data.verifikasi.index');  
    Route::post('/admin/data-status-verifikasi/tambah', [VerifikasiController::class, 'store'])->name('admin.referensi-data.verifikasi.store');  
    Route::patch('/admin/data-status-verifikasi/ubah/{id}', [VerifikasiController::class, 'update'])->name('admin.referensi-data.verifikasi.update');  
    Route::delete('/admin/data-status-verifikasi/hapus/{id}', [VerifikasiController::class, 'destroy'])->name('admin.referensi-data.verifikasi.destroy');  
    
    //verifikator
    Route::get('/admin/data-verifikator', [VerifikatorController::class, 'index'])->name('admin.referensi-data.verifikator.index');
    Route::post('/admin/data-verifikator/tambah', [VerifikatorController::class, 'store'])->name('admin.referensi-data.verifikator.store');
    Route::patch('/admin/data-verifikator/update/{id}', [VerifikatorController::class, 'update'])->name('admin.referensi-data.verifikator.update');
    Route::delete('/admin/data-verifikator/hapus/{id}', [VerifikatorController::class, 'destroy'])->name('admin.referensi-data.verifikator.destroy');

    //export excel
    // Route::get('member-export', [MemberController::class, 'export'])->name('member.export'); 

    //example
    // Route::get('/exportpegawai','PegawaiController@pegawaiexport'->name('exportpegawai'))
    // Route::post('/importpegawai','PegawaiController@pegawaiimportexcel'->name('importpegawai'));;

    // pengaturan
    Route::get('/admin/pengguna-sistem', function () { return view('admin.pengaturan.pengguna-sistem.index'); });
    Route::get('/admin/kelola-hak-akses', function () { return view('admin.pengaturan.kelola-hak-akses.index'); });

});