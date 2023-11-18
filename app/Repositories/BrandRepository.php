<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository extends BaseRepository
{
    public function __construct(Brand $model)
    {
        $this->model = $model;
    }
}
