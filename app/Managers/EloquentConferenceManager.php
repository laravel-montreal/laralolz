<?php

namespace App\Managers;

use App\Conference;
use App\Jobs\CreateConference;
use Carbon\Carbon;

class EloquentConferenceManager extends EloquentManagerBase implements ConferenceManagerInterface
{
    protected $model;

    /**
     * @param Conference $model
     */
    public function __construct(Conference $model)
    {
        $this->model = $model;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->model->where('Name', $name)->first();
    }

    /**
     * @param $venue
     */
    public function getByVenue($venue)
    {

        // TODO: Implement getByVenue() method.
    }

    /**
     *
     */
    public function getUpcoming()
    {
        return $this->model
                    ->where('starts_at', '>=', Carbon::now())
                    ->orWhere('ends_at', '<=', Carbon::now())
                    ->orderBy('starts_at', 'asc');
    }

    /**
     * @param $conferenceData
     */
    public function create($conferenceData)
    {
        return $this->dispatch(new CreateConference($conferenceData));
    }
}
