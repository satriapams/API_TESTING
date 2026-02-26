<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'is_active',
        'release_date',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'release_date' => 'date',
    ];
}
