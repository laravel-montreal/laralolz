<?php

namespace App\Managers;

use App\Outing;
use Carbon\Carbon;

class EloquentOutingManager extends EloquentManagerBase implements OutingManagerInterface
{
    protected $model;

    /**
     * @param Outing $model
     */
    public function __construct(Outing $model)
    {
        $this->model = $model;
    }

    /**
	 * Get upcoming outings for the given conference
	 *
     * @param Conference $conference
     */
    public function getUpcomingForConference($conference)
    {
        return $conference->outings()
						  ->where('starts_at', '>=', Carbon::now())
						  ->orWhere('ends_at', '>=', Carbon::now())
						  ->orderBy('starts_at', 'asc');
    }
    
    /**
     * @param $outingData
     */
    public function create($outingData)
    {
        // TODO: implement create() method
    }
    
    /**
     * @param $user
     */
    public function addParticipant($user)
    {
        // TODO: implement addParticipant() method
    }
    
}
