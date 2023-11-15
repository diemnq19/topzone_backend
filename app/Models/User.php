<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Tên bảng dữ liệu tương ứng
    protected $table = 'users';

    // Các trường có thể gán giá trị
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone'
    ];

    // Các trường bị ẩn (không hiển thị)
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Định nghĩa mối quan hệ một-nhiều với bảng Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function shoppingCarts()
{
    return $this->hasMany(ShoppingCart::class);
}

}
