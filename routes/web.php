<?php
use App\Http\Controllers\BentengController;

Route::get('/', [BentengController::class, 'showLogin']);
Route::post('/login', [BentengController::class, 'login']);
Route::get('/register', [BentengController::class, 'showRegister']);
Route::post('/register', [BentengController::class, 'register']);
Route::get('/dashboard', [BentengController::class, 'dashboard']);
Route::get('/inventory', [BentengController::class, 'inventory']);
Route::get('/tambah-produk', [BentengController::class, 'TambahProduk']);
Route::post('/simpan-produk', [BentengController::class, 'simpanProduk']);
Route::get('/edit-produk/{id}', [BentengController::class, 'editProduk']);
Route::post('/update-produk/{id}', [BentengController::class, 'updateProduk']);
Route::get('/hapus-produk/{id}', [BentengController::class, 'hapusProduk']);
Route::get('/transaksi', [BentengController::class, 'transaksi']);
Route::get('/tambah-transaksi', [BentengController::class, 'tambahTransaksi']);
Route::post('/simpan-transaksi', [BentengController::class, 'simpanTransaksi']);
Route::get('/edit-transaksi/{id}', [BentengController::class, 'editTransaksi']);
Route::post('/update-transaksi/{id}', [BentengController::class, 'updateTransaksi']);
Route::get('/hapus-transaksi/{id}', [BentengController::class, 'hapusTransaksi']);
Route::get('/logout', [BentengController::class, 'logout']);
