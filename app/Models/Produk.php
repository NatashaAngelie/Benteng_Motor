<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // pastikan sesuai nama tabel
    protected $fillable = ['nama_produk', 'harga_per_unit', 'jumlah']; // sesuaikan dengan kolom yang kamu punya
}
