<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ShoppingCart;

class ShoppingCartRepository extends BaseRepository
{
    public function __construct(ShoppingCart $model)
    {
        $this->model = $model;
    }

    public function findByUserId($id){
        return $this->model->where('user_id', $id)
        ->where('progress', false)
        ->with('product')
        ->get();
    }

    public function updateProgress($shoppingCartList)
    {
        $this->model->whereIn('id', $shoppingCartList)->update(['progress' => true]);
    }
}
