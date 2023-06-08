<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakPesanController;
use App\Http\Controllers\PemesananController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/tesquery', [DashboardController::class, 'ajaxCounting']);

Route::get('/', [HomeController::class, 'index'])->name('user.landing');
Route::get('/backup', [HomeController::class, 'backup'])->name('user.backup');
Route::get('/forum', [HomeController::class, 'forum'])->name('user.forum');
Route::get('/stasiun', [HomeController::class, 'stasiun'])->name('user.stasiun');
Route::get('/store', [HomeController::class, 'store'])->name('user.store');
Route::get('/tukar-tambah', [HomeController::class, 'tukarTambah'])->name('user.tukar-tambah');

Route::post('/contact', [HomeController::class, 'contactUs'])->name('user.contact');

Route::get('/pemesanan/{id}', [PemesananController::class, 'index'])->name('user.pemesanan');
Route::post('/pemesanan/{id}', [PemesananController::class, 'store'])->name('user.pemesanan.store');

Route::get('/count-pesanan', [DashboardController::class, 'chartStatusPesanan'])->name('user.count-pesanan');
Route::get('/top-provinsi-stasiun', [DashboardController::class, 'ajaxTopProvinsi'])->name('user.top-provinsi-stasiun');

Auth::routes();
// Route::get('/login', [KendaraanController::class, 'lamanlogin'])->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::post('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    
    Route::prefix('messages')->group(function(){
        Route::get('/', [KontakPesanController::class, 'index'])->name('admin.messages');
        Route::get('/ajax', [KontakPesanController::class, 'ajax'])->name('admin.messages.ajax');
        Route::get('/edit/{id}', [KontakPesanController::class, 'edit'])->name('admin.messages.edit');
        Route::post('/', [KontakPesanController::class, 'store'])->name('admin.messages.store');
        Route::patch('/update/{id}', [KontakPesanController::class, 'update'])->name('admin.messages.update');
        Route::delete('/delete/{id}', [KontakPesanController::class, 'destroy'])->name('admin.messages.destroy');
    });
    
    Route::prefix('galeri')->group(function(){
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri');
        Route::get('/ajax', [GaleriController::class, 'ajax'])->name('admin.galeri.ajax');
        Route::get('/edit/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
        Route::post('/', [GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::patch('/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/delete/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
    });
    
    Route::prefix('klien')->group(function(){
        Route::get('/', [KlienController::class, 'index'])->name('admin.klien');
        Route::get('/ajax', [KlienController::class, 'ajax'])->name('admin.klien.ajax');
        Route::get('/edit/{id}', [KlienController::class, 'edit'])->name('admin.klien.edit');
        Route::post('/', [KlienController::class, 'store'])->name('admin.klien.store');
        Route::patch('/update/{id}', [KlienController::class, 'update'])->name('admin.klien.update');
        Route::delete('/delete/{id}', [KlienController::class, 'destroy'])->name('admin.klien.destroy');
    });
    
    Route::prefix('provinsi')->group(function(){
        Route::get('/', [ProvinsiController::class, 'index'])->name('admin.provinsi');
        Route::get('/ajax', [ProvinsiController::class, 'ajax'])->name('admin.provinsi.ajax');
        Route::get('/edit/{id}', [ProvinsiController::class, 'edit'])->name('admin.provinsi.edit');
        Route::post('/', [ProvinsiController::class, 'store'])->name('admin.provinsi.store');
        Route::patch('/update/{id}', [ProvinsiController::class, 'update'])->name('admin.provinsi.update');
        Route::delete('/delete/{id}', [ProvinsiController::class, 'destroy'])->name('admin.provinsi.destroy');
    });
    
    Route::prefix('kota')->group(function(){
        Route::get('/', [KotaController::class, 'index'])->name('admin.kota');
        Route::get('/ajax', [KotaController::class, 'ajax'])->name('admin.kota.ajax');
        Route::get('/edit/{id}', [KotaController::class, 'edit'])->name('admin.kota.edit');
        Route::post('/', [KotaController::class, 'store'])->name('admin.kota.store');
        Route::patch('/update/{id}', [KotaController::class, 'update'])->name('admin.kota.update');
        Route::delete('/delete/{id}', [KotaController::class, 'destroy'])->name('admin.kota.destroy');
    });

    Route::prefix('kendaraan')->group(function(){
        Route::get('/', [KendaraanController::class, 'index'])->name('admin.kendaraan');
        Route::get('/ajax', [KendaraanController::class, 'ajax'])->name('admin.kendaraan.ajax');
        Route::get('/edit/{id}', [KendaraanController::class, 'edit'])->name('admin.kendaraan.edit');
        Route::post('/', [KendaraanController::class, 'store'])->name('admin.kendaraan.store');
        Route::patch('/update/{id}', [KendaraanController::class, 'update'])->name('admin.kendaraan.update');
        Route::delete('/delete/{id}', [KendaraanController::class, 'destroy'])->name('admin.kendaraan.destroy');
    });

    Route::prefix('baterai')->group(function(){
        Route::get('/', [BateraiController::class, 'index'])->name('admin.baterai');
        Route::get('/ajax', [BateraiController::class, 'ajax'])->name('admin.baterai.ajax');
        Route::get('/edit/{id}', [BateraiController::class, 'edit'])->name('admin.baterai.edit');
        Route::post('/', [BateraiController::class, 'store'])->name('admin.baterai.store');
        Route::patch('/update/{id}', [BateraiController::class, 'update'])->name('admin.baterai.update');
        Route::delete('/delete/{id}', [BateraiController::class, 'destroy'])->name('admin.baterai.destroy');
    });

    Route::prefix('merk')->group(function(){
        Route::get('/', [MerkController::class, 'index'])->name('admin.merk');
        Route::get('/ajax', [MerkController::class, 'ajax'])->name('admin.merk.ajax');
        Route::get('/edit/{id}', [MerkController::class, 'edit'])->name('admin.merk.edit');
        Route::post('/', [MerkController::class, 'store'])->name('admin.merk.store');
        Route::patch('/update/{id}', [MerkController::class, 'update'])->name('admin.merk.update');
        Route::delete('/delete/{id}', [MerkController::class, 'destroy'])->name('admin.merk.destroy');
    });

    Route::prefix('admin/stasiun')->group(function(){
        Route::get('/', [StasiunController::class, 'index'])->name('admin.stasiun');
        Route::get('/ajax', [StasiunController::class, 'ajax'])->name('admin.stasiun.ajax');
        Route::get('/edit/{id}', [StasiunController::class, 'edit'])->name('admin.stasiun.edit');
        Route::post('/', [StasiunController::class, 'store'])->name('admin.stasiun.store');
        Route::patch('/update/{id}', [StasiunController::class, 'update'])->name('admin.stasiun.update');
        Route::delete('/delete/{id}', [StasiunController::class, 'destroy'])->name('admin.stasiun.destroy');
    });
    
    Route::prefix('pesanan')->group(function(){
        Route::get('/', [PesananController::class, 'index'])->name('admin.pesanan');
        Route::get('/ajax', [PesananController::class, 'ajax'])->name('admin.pesanan.ajax');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
