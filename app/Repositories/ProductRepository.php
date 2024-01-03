<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getProductByCondition($brandId = null, $sortBy = null, $name = null)
    {
        $query = $this->model->query();

        if ($brandId !== null) {
            $query->where('brand_id', $brandId);
        }

        if ($name !== null) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($sortBy === 'priceup') {
            $query->orderBy('price', 'asc');
        } elseif ($sortBy === 'pricedown') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->get();

        return $products;
    }

}
