<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans' ;
    public $timestamps = true; 
    protected $fillable = [
        'code_pesanan',
        'sku_transaksi',
        'total_qty',
        'total_harga',
        'nama_customer',
        'alamat',
        'no_telp',
        'ekspedisi',
    ];

    protected $hidden;
}
