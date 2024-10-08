<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = true;
    protected $fillable = [
        'sku',
        'nama_product',
        'type',
        'kategori',
        'harga',
        'discount',
        'stock',
        'foto',
        'is_active',

    ];

    protected $hidden;
}
