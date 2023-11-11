<?php

declare(strict_types=1);

namespace App\Repositories;

use App\ShoppingCart;

class ShoppingCartRepository extends BaseRepository
{
    public function __construct(ShoppingCart $model)
    {
        $this->model = $model;
    }
}
