<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Review;

class ReviewRepository extends BaseRepository
{
    public function __construct(Review $model)
    {
        $this->model = $model;
    }
}
