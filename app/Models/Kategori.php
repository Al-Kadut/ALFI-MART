<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Ini kunci penyelesaian errornya: mengizinkan kolom diisi data
    protected $fillable = ['nama_kategori'];

    // Relasi ke tabel barang (1 kategori punya banyak barang)
    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_kategori');
    }
}