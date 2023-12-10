<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'price', 'brand_id','image_url','percent_discount', 'unit'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function setImageUrlAttribute($value)
    {
        $this->attributes['image_url'] = json_encode($value);
    }

    public function getImageUrlAttribute($value)
    {
        return json_decode($value, true);
    }
    public function getFullBrandInfoAttribute()
    {
        if ($this->brand) {
            return $this->brand->toArray();
        } else {
            return null;
        }
    }
}
