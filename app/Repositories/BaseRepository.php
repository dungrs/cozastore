<?php

namespace App\Repositories;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BaseRepository implements BaseRepositoryInterface  {
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function paginate(
        array $column = ['*'],
        array $condition = [],
        int $perpage = 2,
        int $page = 1,
        array $extend = [],
        array $orderBy = ['id', 'DESC'],
        array $join = [],
        array $relations = [],
        array $rawQuery = [],
    ) {
        $query = $this->model->select($column);
        return $query
            ->keyword($condition['keyword'] ?? null, $extend['fieldSearch'])
            ->publish($condition['publish'] ?? null)
            ->customWhere($condition['where'] ?? null)
            ->customWhereRaw($rawQuery['whereRaw'] ?? null)
            ->relation($relations ?? null)
            ->relationCount($relations ?? null)
            ->customJoin($join ?? null)
            ->extendCustomGroupBy($extend['groupBy'] ?? null)
            ->extendCustomOrderBy($orderBy ?? ['id', 'DESC'])
            ->forPage($page, $perpage)
            ->paginate($perpage)
            ->withQueryString()
            ->withPath(env('APP_URL') . ($extend['path'] ?? ''));
    }

    public function all(array $relation = [], string $selectRaw = '*') {
        $query = $this->model->newQuery();
        $query->selectRaw($selectRaw);
        if (!empty($relation)) {
            $query->with($relation);
        }

        return $query->get();
    }

    public function create($payload = []) {
        $model = $this->model->create($payload);
        return $model->refresh();
    }

    public function findById(int $modelId, array $column = ['*'], array $relation = []) {
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }

    public function update(int $id = 0, array $payload = []) {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function updateByWhere(array $condition = [], array $payload = []) {
        foreach ($condition as $val) {
            if ($val[1] == 'IN') {
                $query = $this->model->whereIn($val[0], $val[2]);
            } else {
                $query = $this->model->where($val[0], $val[1], $val[2]);
            }
        }

        return $query->update($payload);
    }

    public function delete(int $id = 0) {
        return $this->findById($id)->delete();
    }

}