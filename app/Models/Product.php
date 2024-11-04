<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'kode_produk',
        'harga_jual',
        'harga_beli',
        'stok',
        'satuan',
        'kategori',
        'gambar',
        'status',
    ];
}
