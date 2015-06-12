<?php
namespace App\Repositories;

use App\Conference;

class EloquentConferenceRepository extends EloquentRepositoryBase implements ConferenceRepositoryInterface
{

    public function __construct(Conference $model)
    {
        $this->model = $model;
    }

    public function getByName($name)
    {
        $this->where('Name', $name)->first();
    }

    public function getByVenue($venue)
    {

        // TODO: Implement getByVenue() method.
    }

    public function getUpcomming($id)
    {
        // TODO: Implement getUpcomming() method.
    }
}