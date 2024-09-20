<?php

namespace App\Http\Repository;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function get();
    public function post($data);
    public function delete($id, Model $model);
    public function put($id, $data, Model $model);
    public function getById(int $id);
}
