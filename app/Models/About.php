<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'website',
        'facebook',
        'instagram',
        'twitter',
        'ceo_name',
        'ceo_msg',
        'ceo_photo',
        'chairman_name',
        'chairman_msg',
        'chairman_photo',
        'logo'
    ];
}
