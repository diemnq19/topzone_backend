<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function shoppingCarts()
{
    return $this->hasMany(ShoppingCart::class);
}
}
