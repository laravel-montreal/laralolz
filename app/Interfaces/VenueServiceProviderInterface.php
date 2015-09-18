<?php

namespace App\Interfaces;

interface VenueServiceProviderInterface
{

    /**
     * @param $params
     * @return mixed
     */
    public function searchByLocation($params);

    /**
     * @param $params
     * @return mixed
     */
    public function searchByTerms($params);

}
