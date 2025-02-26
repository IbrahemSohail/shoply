<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
  
    protected $fillable = [
        'name',
        'title',
        'description',
        'size',
        'price',
        'tax',
        'taxes_id',
        'categories_id',
        'colors_id',
        'image_path'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
