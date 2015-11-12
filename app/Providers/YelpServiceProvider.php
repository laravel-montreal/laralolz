<?php

namespace App\Providers;

use App\Interfaces\VenueServiceProviderInterface;

class YelpServiceProvider implements VenueServiceProviderInterface
{

    protected $oauth;

    public function getAuthenticateHeader()
    {
        return [
            'YELP_OAUTH_CONSUMER_KEY' => env('YELP_OAUTH_CONSUMER_KEY'),
            'YELP_OAUTH_CONSUMER_SECRET' => env('YELP_OAUTH_CONSUMER_SECRET'),
            'YELP_OAUTH_TOKEN' => env('YELP_OAUTH_TOKEN'),
            'YELP_OAUTH_TOKEN_SECRET' => env('YELP_OAUTH_TOKEN_SECRET'),
        ];
    }

    /**
     * @param $params
     * @return mixed
     */
    public function search(array $params)
    {
        // TODO: Implement searchByLocation() method.
    }

}