<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'product_id', 
        'quantity',
        'total_price',
        'payment',
        'change',
    ];
}
