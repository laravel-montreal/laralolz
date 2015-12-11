<?php

namespace App\Managers;

interface OutingManagerInterface extends ManagerBaseInterface
{
    /**
	 * Get upcoming outings for the given conference
	 *
     * @return mixed
     */
    public function getUpcomingForConference($conference);
}
