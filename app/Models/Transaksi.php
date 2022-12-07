<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'name',
        'email',
        'nama_produk',
        'jumlah_beli',
        'harga',
        'total_harga',
    ];
}
