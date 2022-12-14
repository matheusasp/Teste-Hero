<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $User)
    {
        $this->model = $User;
    }


    public function all()
    {
        return $this->model->orderBy('name')->get();
    }
    public function find($id): User
    {

    return $this->model->whereId($id)->firstOrFail();

    }

    public function findByEmail($email): User
    {

    return $this->model->whereEmail($email)->firstOrFail();

    }

    public function findByToken($tokenData)
    {
    return $this->model->whereToken($tokenData['token'])->whereId($tokenData['id'])->first();
    }

    public function store($data): User
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
        return $this->model->destroy($id);
    }
}