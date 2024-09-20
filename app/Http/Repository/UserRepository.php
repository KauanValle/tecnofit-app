<?php

namespace App\Http\Repository;

use App\Models\User;

class UserRepository extends RepositoryAbstract
{
    public function __construct()
    {
        $this->setModel(new User());
    }

    public function get()
    {
        return $this->model->newQuery()->select([User::ID, User::NAME])->get();
    }

    public function getById(int $id)
    {
        $data = $this->model->newQuery()->where(User::ID, $id)->select([User::ID, User::NAME])->get();
        if(empty($data->toArray())){
            return false;
        }

        return $data;
    }

    public function putUpdateUser($id, $data)
    {
        return $this->put($id, $data, new User());
    }

    public function deleteUser($id){
        return $this->delete($id, new User());
    }
}
