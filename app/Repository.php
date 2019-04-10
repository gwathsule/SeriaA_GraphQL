<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class Repository
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $queryBuilder;

    /**
     * @var int $perPage
     */
    protected $perPage = 15;

    public function __construct()
    {
        $this->getQueryBuilder();
    }

    private function getQueryBuilder()
    {
        $this->queryBuilder = $this->model::query();
        return $this;
    }

    /**
     * Retrieve model by id key.
     *
     * @param int $keyValue
     * @param array $columns
     * @param string $keyName
     * @return Model|null
     */
    public function getByKey(int $keyValue, array $columns = ['*'], string $keyName = 'id')
    {
        return $this->queryBuilder
            ->where($keyName, $keyValue)
            ->first($columns);
    }
}
