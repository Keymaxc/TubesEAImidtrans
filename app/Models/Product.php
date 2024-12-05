<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Pastikan nama tabel sesuai di database

    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
        'image', // Tambahkan kolom ini jika Anda menyimpan gambar
    ];

    /**
     * Relasi ke Cart (Keranjang)
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
