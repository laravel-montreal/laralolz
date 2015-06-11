<?php

use App\Venue;

class VenueTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh', ['--env' => 'testing']);
        $this->seed();
    }

    public function testCreate()
    {
        $venue = factory('App\Venue')->create();

        $dbVenue = Venue::first();

        $this->assertEquals($venue->id, $dbVenue->id);
    }

    public function testOutings()
    {
        $venue = factory('App\Venue')->create();

        $outings = [];
        $outings[] = factory('App\Outing')->create();
        $outings[] = factory('App\Outing')->create([
            'slug' => 'Le-sapin-a-des-boules-2',
            'title' => 'Le-sapin-a-des-boules-2',
        ]);
        $outings = collect($outings);
        $venue->outings()->saveMany($outings);

        $dbVenue = Venue::first();
        $dbOutings = $dbVenue->outings()->get();

        $this->assertEquals($outings->lists('id')->all(), $dbOutings->lists('id')->all());
    }
}
