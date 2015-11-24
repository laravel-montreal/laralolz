<?php

namespace App\Managers;

interface ConferenceManagerInterface extends ManagerBaseInterface
{
    /**
     * @param $name
     *
     * @return mixed
     */
    public function getByName($name);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getByVenue($id);

    /**
     * @return mixed
     */
    public function getUpcoming();
}
