<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Facades\Schema;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * @return mixed
     */
    public function save(array $inputs, array $conditons = ['id' => null])
    {
        return $this->model->updateOrCreate($conditons, $inputs);
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->model->where(function($query) {
            $tableName = $this->model->getTable();
            $query->whereNull("{$tableName}.delete_key")->orWhere("{$tableName}.delete_key", 0);
        })->get();
    }

    /**
     * @return mixed
     */
    public function with(array $withRelation)
    {
        return $this->model->where(function($query) {
                $tableName = $this->model->getTable();
                $query->whereNull("{$tableName}.delete_key")->orWhere("{$tableName}.delete_key", 0);
            })->with($withRelation);
    }

    /**
     * @return mixed
     */
    public function paginate(array $inputs = [], $limit = self::PER_PAGE, array $withRelation = [])
    {
        $query = $this->model->query()->where(function($query) {
            $tableName = $this->model->getTable();
            $query->whereNull("{$tableName}.delete_key")->orWhere("{$tableName}.delete_key", 0);
        });

        if ($this->isValidSortColumn($inputs['sort_column'] ?? null) && $this->isValidSortType($inputs['sort_type'] ?? null)) {
            $query->orderBy($inputs['sort_column'], $inputs['sort_type']);
        }

        if ($withRelation) {
            $query->with($withRelation);
        }

        return $query->paginate($limit);
    }

    /**
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->where(function($query) {
            $tableName = $this->model->getTable();
            $query->whereNull("{$tableName}.delete_key")->orWhere("{$tableName}.delete_key", 0);
        })->find($id);
    }

    /**
     * @return mixed
     */
    public function findByIdWithRelation($id, array $withRelation)
    {
        return $this->model->where(function($query) {
            $tableName = $this->model->getTable();
            $query->whereNull("{$tableName}.delete_key")->orWhere("{$tableName}.delete_key", 0);
        })->with($withRelation)->find($id);
    }

    /**
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $columnName
     * return bool | $columnName
     */
    protected function isValidSortColumn($columnName)
    {
        if (empty($columnName)) {
            return false;
        }

        if (! Schema::hasColumn($this->model->getTable(), trim($columnName))) {
            return false;
        }

        return trim($columnName);
    }

    /**
     * @param $columnName
     * return bool | $columnName
     */
    protected function isValidSortType($sortType)
    {
        if (empty($sortType)) {
            return false;
        }

        if (! in_array(strtolower(trim($sortType)), ['desc', 'asc'])) {
            return false;
        }

        return strtolower(trim($sortType));
    }
}
