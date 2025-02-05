<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface {
    public function all(array $relation = [], string $selectRaw = '');
    public function create($payload = []);
    public function paginate(
        array $column = ['*'],
        array $condition = [],
        int $perpage = 1,
        int $page = 1,
        array $extend = [],
        array $orderBy = ['id', 'DESC'],
        array $join = [],
        array $relations = [],
        array $rawQuery = [],
    );
    public function findById(int $modelId, array $column = ['*'], array $relation = []);
    public function updateByWhere(array $condition = [], array $payload = []);
    public function update(int $id = 0, array $payload = []);
    public function delete(int $id = 0);
}