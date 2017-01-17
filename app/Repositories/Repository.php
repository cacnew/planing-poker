<?php

namespace App\Repositories;


use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

abstract class Repository extends BaseRepository implements RepositoryInterface
{
    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                if (count($value)>3) {
                    if ($value[3] == 'OR') {
                        $this->model = $this->model->orWhere($field, $condition, $val);
                        continue;
                    }
                }
                $this->model = $this->model->where($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }

}