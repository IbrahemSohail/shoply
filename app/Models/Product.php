<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
  
    protected $fillable = [
        'name',
        'title',
        'description',
        'size',
        'price',
        'offer_price',
        'tax',
        'tax_id',
        'category_id',
        'color_id',
        'image_path'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'products_id');
    }
}
