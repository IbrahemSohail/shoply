<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'users_id',
        'order_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
    return $this->hasMany(Cart::class,'orders_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
