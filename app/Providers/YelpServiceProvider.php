<?php

namespace App\Providers;

use App\Interfaces\VenueServiceProviderInterface;
//OAuthToken

class YelpServiceProvider implements VenueServiceProviderInterface
{
    const YELP_ENDPOINT = 'https://api.yelp.com/v2/';

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
        $query = http_build_query($params);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => self::YELP_ENDPOINT . '/' . $query,
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $response;
    }

    public function authenticate()
    {
//        $unsigned_url = "https://" . $host . $path;
//
//        $token = new OAuthToken($GLOBALS['TOKEN'], $GLOBALS['TOKEN_SECRET']);
//        $consumer = new OAuthConsumer($GLOBALS['CONSUMER_KEY'], $GLOBALS['CONSUMER_SECRET']);
//        $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
//
//        $oauthrequest = OAuthRequest::from_consumer_and_token(
//            $consumer,
//            $token,
//            'GET',
//            $unsigned_url
//        );
//
//        $oauthrequest->sign_request($signature_method, $consumer, $token);
    }

}