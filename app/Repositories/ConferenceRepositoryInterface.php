<?php

namespace App\Repositories;

interface ConferenceRepositoryInterface extends RepositoryBaseInterface
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
    public function getUpcomming();
}
