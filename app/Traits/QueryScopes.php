<?php

namespace App\Traits;

trait QueryScopes {

    public function scopeKeyword($query, $keyword, $fieldSearch = [], $whereHas = []) {
        if (!empty($keyword)) {
            if (count($fieldSearch) > 0) {
                foreach($fieldSearch as $key => $val) {
                    $query->orWhere($val, 'LIKE', '%' . $keyword . '%');
                }
            } else {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            }
        }

        if (isset($whereHas) && count($whereHas)) {
            $field = $whereHas['field'];
            $query->orWhereHas($whereHas['relation'], function($query) use ($field, $keyword) {
                $query->where($field, 'LIKE', '%' . $keyword . '%');
            });
        }
        return $query;
    }

    public function scopePublish($query, $keyword) {
        if (!empty($keyword)) {
            $query->where('publish', '=', $keyword);
        }
        return $query;
    }

    public function scopeCustomWhere($query, $where = []) {
        if (!empty($where)) {
            foreach($where as $key => $val) {
                $query->where($val[0], $val[1], $val[2]);
            }
        }
        return $query;
    }

    public function scopeCustomWhereRaw($query, $rawQuery = []) {
        if (!empty($rawQuery) && is_array($rawQuery)) {
            foreach($rawQuery as $key => $val) {
                $query->whereRaw($val[0], $val[1]);
            }
        }
        return $query;
    }

    public function scopeRelationCount($query, $relations) {
        if (!empty($relations)) {
            foreach($relations as $item) {
                $query->withCount($item);
            }
        }
        return $query;
    }

    public function scopeRelation($query, $relations) {
        if (!empty($relations)) {
            foreach($relations as $item) {
                $query->with($item);
            }
        }
        return $query;
    }

    public function scopeCustomJoin($query, $joins) {
        if (isset($joins) && is_array($joins) && count($joins)) {
            foreach ($joins as $join) {
                $type = isset($join['type']) ? strtolower($join['type']) : 'inner';
                $table = $join['table'];
                $onConditions = $join['on'];
    
                $query->join($table, function ($joinQuery) use ($onConditions, $type) {
                    foreach ($onConditions as $index => $condition) {
                        if ($index === 0) {
                            $joinQuery->on($condition[0], '=', $condition[1]);
                        } else {
                            $joinQuery->where($condition[0], '=', $condition[1]);
                        }
                    }
                }, null, null, $type);
            }
        }
        return $query;
    }

    public function scopeExtendCustomGroupBy($query, $groupBy) {
        if (isset($groupBy) && !empty($groupBy)) {
            $query->groupBy($groupBy);
        }
        return $query;
    }

    public function scopeExtendCustomOrderBy($query, $orderBy) {
        if (isset($orderBy) && !empty($orderBy)) {
            $query->orderBy($orderBy[0], $orderBy[1]);
        }
        return $query;
    }

    public function scopeCustomDropdownFilter($query, $condition) {
        if (count($condition) > 0) {
            foreach ($condition as $key => $val) {
                if ($val != 'none' && !empty($val) && $val != '') {
                    $query->where($key, '=', $val);
                }
            }
        }

        return $query;
    }

    // public function scopeCustomCreatedAt($query, $condition) {
    //     if (!empty($condition) && $condition != "") {
    //         $explode = explode('-', $condition);
    //         $explode = array_map('trim', $explode);
    //         $start_date = convertDateTime($explode[0]. ' 00:00:00', 'Y-m-d H:i:s');
    //         $end_date = convertDateTime($explode[1]. ' 23:59:59', 'Y-m-d H:i:s');

    //         $query->whereDate('created_at', '>=', $start_date);
    //         $query->whereDate('created_at', '<=', $end_date);
    //     }

    //     return $query;
    // }

}