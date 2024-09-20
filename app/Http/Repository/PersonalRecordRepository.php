<?php

namespace App\Http\Repository;

use App\Models\PersonalRecord;
use App\Models\User;

class PersonalRecordRepository extends RepositoryAbstract
{
    public function get()
    {
        return $this->model->newQuery()
                ->select(PersonalRecord::USER_ID, PersonalRecord::MOVEMENT_ID, \DB::raw('MAX(value) as value'))
                ->groupBy(PersonalRecord::USER_ID, PersonalRecord::MOVEMENT_ID)
                ->orderBy(PersonalRecord::VALUE, 'desc')
                ->get();
    }

    public function getById(int $id)
    {
        $data = $this->model->newQuery()->where(User::ID, $id)->select([User::ID, User::NAME])->get();
        if(!empty($data)){
            return false;
        }

        return $data;
    }
}
