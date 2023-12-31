<?php

declare(strict_types=1);

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public const PER_PAGE = 10;

    public function save(array $inputs, array $conditons = []);

    public function get();

    public function paginate(array $inputs = [], $limit = self::PER_PAGE, array $withRelation = []);

    public function findById($id);

    public function findByIdWithRelation($id, array $withRelation);

    public function deleteById($id);
}
