<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function all();
    public function find($id): User;
    public function store($data): User;
    public function update($id, $data): bool;
    public function destroy($id);
}