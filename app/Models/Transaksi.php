<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'total', 'id_user'];

    // Relasi: Transaksi dilakukan oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi: Satu transaksi memiliki banyak detail barang
    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}