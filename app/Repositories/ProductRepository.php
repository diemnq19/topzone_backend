<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
