<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        if ($id) {
            return  $this->model->whereId($id)->firstOrFail();
        }
        return $this->model->all();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data): bool
    {
        $this->model = $this->find($id);
        return $this->model->update($data);
    }

    public function destroy($id): bool
    {
        $this->model = $this->find($id);
        return $this->model->delete();
    }
}