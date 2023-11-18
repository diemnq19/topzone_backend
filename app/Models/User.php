<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements Authenticatable
{
    use HasApiTokens, Notifiable;
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
    public function getAuthIdentifierName()
    {
        return 'id'; // Tên cột làm nhiệm vụ khóa chính
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password; // Tên cột làm nhiệm vụ mật khẩu
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Tên cột làm nhiệm vụ remember token
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Tên cột làm nhiệm vụ remember token
    }
}
