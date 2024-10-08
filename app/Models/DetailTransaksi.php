<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'id_transaksi',
        'nama_product',
        'status',
    ];

    public function transaksi()
    {
        return $this->hasOne(transaksi::class,['id_transaksi','id']);
    }

    public function product()
    {
        return $this->hasOne(product::class,['id_barang','id']);
    }
}
