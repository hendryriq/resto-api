<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image_url',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}