<?php

declare(strict_types=1);

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
