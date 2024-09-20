<?php

namespace App\Http\Repository;

use App\Models\Movement;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoryAbstract implements RepositoryInterface{
    /**
     * @var Model $model
     */
    protected $model;

    public function post($data): void
    {
        $this->model->fill($data);
        $this->model->save();
    }

    public function getById(int $id)
    {
        $data = $this->model->newQuery()->where('id', $id)->get();
        if(!empty($data)){
            return false;
        }

        return $data;
    }

    public function get()
    {
        return $this->model->newQuery()->get();
    }

    public function put($id, $data, Model $model)
    {
        $oldData = $model::findOrFail($id);
        if(is_null($oldData)){
            return false;
        }
        return $oldData->update($data);
    }

    public function delete($id, Model $model)
    {
        $oldData = $model::find($id);
        if(is_null($oldData)){
            return false;
        }
        return $oldData->delete();
    }

    public function setModel($model): void
    {
        $this->model = $model;
    }
}
