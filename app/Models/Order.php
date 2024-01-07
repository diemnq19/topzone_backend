<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_address', 'order_status', 'receiver_name', 'receiver_phone','user_id'
    ];

    public function shoppingCarts()
{
    return $this->hasMany(ShoppingCart::class);
}
}
