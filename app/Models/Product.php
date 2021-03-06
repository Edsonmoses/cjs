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
        'thurmbnail',
        'subcategory_id',
        'addItem',
        //'addPrice',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
}
