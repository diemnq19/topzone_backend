<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }
}
