<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;

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
//bagian admin
//data produk
Route::get('/data-produk', [App\Http\Controllers\ProdukController::class, 'index']);

Route::get('/tambah-produk', [App\Http\Controllers\ProdukController::class, 'create']);
Route::post('/tambah-produk', [App\Http\Controllers\ProdukController::class, 'store']);
Route::get('edit-produk/{id}', [App\Http\Controllers\ProdukController::class, 'edit']);
Route::put('edit-produk/{id}', [App\Http\Controllers\ProdukController::class, 'update']);
Route::get('hapus-produk/{id}', [App\Http\Controllers\ProdukController::class, 'destroy']);
//data-costumer
Route::get('/data-costumer', [App\Http\Controllers\CostumerController::class, 'index']);

//dashbor toko
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//transaksi pembelian
Route::get('/data-transaksi', [App\Http\Controllers\TransaksiController::class, 'index']);
Route::get('/riwayat-transaksi', [App\Http\Controllers\TransaksiController::class, 'riwayatTransaksi']);
Route::get('tambah-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'masukTransaksi']);
Route::post('tambah-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'buatTransaksi',"TransaksiController@perbaharuiStok",'TransaksiController@ambilSaldo']);
Route::post('tambah-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'perbaharuiStok']);
Route::post('tambah-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'ambilSaldo']);

//ubah profi data diri akun
Route::get('tampil-profil/', [App\Http\Controllers\profilController::class, 'profil']);
Route::get('mengubah-profil/', [App\Http\Controllers\profilController::class, 'mengubahProfil']);
Route::put('update-profil/{id}', [App\Http\Controllers\profilController::class, 'updateProfil']);
Route::get('top-up-saldo/', [App\Http\Controllers\profilController::class, 'topUp']);
Route::put('isi-saldo/', [App\Http\Controllers\profilController::class, 'isiSaldo']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
