<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index'])->name('user.landing');
Route::get('/backup', [HomeController::class, 'backup'])->name('user.backup');
Route::get('/forum', [HomeController::class, 'forum'])->name('user.forum');
Route::get('/stasiun', [HomeController::class, 'stasiun'])->name('user.stasiun');
Route::get('/store', [HomeController::class, 'store'])->name('user.store');
Route::get('/tukar-tambah', [HomeController::class, 'tukarTambah'])->name('user.tukar-tambah');


Auth::routes();
Route::get('/login', [KendaraanController::class, 'lamanlogin'])->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
