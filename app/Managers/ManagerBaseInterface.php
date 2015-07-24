<?php
namespace App\Managers;

use Illuminate\Database\Eloquent\Model;

interface ManagerBaseInterface
{
    /**
     * @param $id
     * @return Model
     */
    public function getById($id);

    /**
     * @param $data
     * @return static
     */
    public function create($data);

    /**
     * @param $model
     * @return mixed
     */
    public function edit(Model $model);

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id);
}
