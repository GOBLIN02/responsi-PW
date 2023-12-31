<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::controller(AuthController::class)->group(function(){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('Login', 'Login')->name('Login');
    Route::post('Login', 'LoginAksi')->name('Login.aksi');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(BarangController::class)->prefix('barang')->group(function() {
    Route::get('', 'index')->name('barang');
    Route::get('tambah', 'tambah')->name('barang.tambah');
    Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('barang.edit');
    Route::post('edit/{id}', 'update')->name('barang.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
});