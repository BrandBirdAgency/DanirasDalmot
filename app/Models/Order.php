<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'product_id',
        'quantity',
        'price',
        'total_price',
        'status',
        'ward_no',
        'district'
    ];

    protected $appends = ['total_price'];

    public function getTotalPriceAttribute()
    {
        // If total_price is already set, return it
        if (isset($this->attributes['total_price'])) {
            return $this->attributes['total_price'];
        }
        
        // Otherwise calculate from price * quantity
        return ($this->attributes['price'] ?? 0) * ($this->attributes['quantity'] ?? 1);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
