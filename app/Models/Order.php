<?php

namespace App\Models;

use App\Repositories\ShoppingCartRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_address', 'order_status', 'receiver_name', 'receiver_phone','user_id', 'shopping_carts'
    ];

    protected $appends = ['shopping_cart_list'];

    public function shoppingCarts()
{
    return $this->hasMany(ShoppingCart::class);
}

public function getShoppingCartListAttribute()
{
    // Lấy danh sách shopping cart dựa trên shopping_carts
    $shoppingCartList = app(ShoppingCartRepository::class)->findByIds( json_decode($this->attributes['shopping_carts'], true));

    return $shoppingCartList;
}

}
