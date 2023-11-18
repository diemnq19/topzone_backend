<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\News;

class NewsRepository extends BaseRepository
{
    public function __construct(News $model)
    {
        $this->model = $model;
    }
}
