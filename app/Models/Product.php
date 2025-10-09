<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'description',
        'in_stock',
        'home',
        'retail_price',
        'discount',
        'price',
        'category',
        'brand_name',
        'size',
        'qr_code',
        'qr_path',
        'bar_path',
        'bar_code',
        'bar_number'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
