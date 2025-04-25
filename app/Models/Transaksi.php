<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'pembukuan';

    protected $fillable = ['tanggal_transaksi', 'total_harga', 'pesan', 'tipe'];
}
