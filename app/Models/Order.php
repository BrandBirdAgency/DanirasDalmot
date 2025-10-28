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
        'status',
        'ward_no',
        'district'
    ];

    // Accessor to calculate total price dynamically
    public function getTotalPriceAttribute()
    {
        return ($this->price ?? 0) * ($this->quantity ?? 1);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
