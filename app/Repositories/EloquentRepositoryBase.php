<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepositoryBase implements RepositoryBaseInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param $id
     * @return Model
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $data
     * @return static
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $model
     * @return mixed
     */
    public function edit(Model $model)
    {
        return $model->save();
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->getById($id)->delete();
    }
}