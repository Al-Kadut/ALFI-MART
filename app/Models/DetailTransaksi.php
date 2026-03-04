<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = ['id_transaksi', 'id_barang', 'jumlah', 'subtotal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}