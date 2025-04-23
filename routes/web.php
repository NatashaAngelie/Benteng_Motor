<?php
use App\Http\Controllers\BentengController;

Route::get('/', [BentengController::class, 'showLogin']);
Route::post('/login', [BentengController::class, 'login']);
Route::get('/register', [BentengController::class, 'showRegister']);
Route::post('/register', [BentengController::class, 'register']);
Route::get('/inventory', [BentengController::class, 'inventory']);
Route::get('/tambah-produk', [BentengController::class, 'TambahProduk']);
Route::post('/simpan-produk', [BentengController::class, 'simpanProduk']);
Route::get('/logout', [BentengController::class, 'logout']);
