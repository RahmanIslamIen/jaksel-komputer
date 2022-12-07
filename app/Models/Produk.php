<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'gambar',
        'nama_produk',
        'kategori',
        'deskripsi',
        'stok',
        'harga',
    ];
}
