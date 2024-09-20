<?php

namespace App\Http\Repository;

use App\Models\Movement;

class MovementRepository extends RepositoryAbstract
{
    public function __construct()
    {
        $this->setModel(new Movement());
    }

    public function get()
    {
        return $this->model->newQuery()->select([Movement::ID, Movement::NAME])->get();
    }

    public function getById(int $id)
    {
        $data = $this->model->newQuery()->where(Movement::ID, $id)->select([Movement::ID, Movement::NAME])->get();
        if(empty($data->toArray())){
            return false;
        }

        return $data;
    }

    public function putUpdateMovement($id, $data)
    {
        return $this->put($id, $data, new Movement());
    }

    public function deleteMovement($id){
        return $this->delete($id, new Movement());
    }
}
