<?php

namespace App\Interfaces;

interface VenueServiceProviderInterface
{

    /**
     * @param array $params
     * @return mixed
     */
    public function search(array $params);

}
