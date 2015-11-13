<?php

use App\Providers\YelpServiceProvider;

class YelpServiceProviderTest extends TestCase
{
    private $venueServiceProviderMock;

    public function setUp()
    {
        parent::setUp();
        $this->venueServiceProviderMock = Mockery::mock('App\Managers\VenueServiceProviderInterface');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testAuthenticateHeadersAreValid()
    {
        $yelpServiceProvider = new YelpServiceProvider();
        $headers = $yelpServiceProvider->getAuthenticateHeader();
        $this->assertTrue(array_key_exists('YELP_OAUTH_CONSUMER_KEY', $headers));
        $this->assertTrue(array_key_exists('YELP_OAUTH_CONSUMER_SECRET', $headers));
        $this->assertTrue(array_key_exists('YELP_OAUTH_TOKEN', $headers));
        $this->assertTrue(array_key_exists('YELP_OAUTH_TOKEN_SECRET', $headers));
    }

    public function testSearchByLocationReturnsArray()
    {
        $yelpServiceProvider = new YelpServiceProvider();

        $params = [
            'location' => 'Montréal',
        ];

        $result = $yelpServiceProvider->search($params);

        $this->assertInternalType('array', $result);
    }

}
