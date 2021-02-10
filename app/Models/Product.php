<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="products";

    protected $fillable = [
        'name',
        'slug',
        'description',
        'regular_price',
        'image',
        'subcategory_id',
    ];
}
