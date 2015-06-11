<?php

use App\Conference;
use App\Outing;
use App\Venue;

class ModelsTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh', ['--env' => 'testing']);
        $this->seed();
    }

    public function testVenueCreate()
    {
        $venue = factory('App\Venue')->create();

        $dbVenue = Venue::first();

        $this->assertEquals($venue->id, $dbVenue->id);
    }

    public function testOutingCreate()
    {
        $outing = factory('App\Outing')->create();

        $dbOuting = Outing::first();

        $this->assertEquals($outing->id, $dbOuting->id);
    }

    public function testConferenceOuting()
    {
        $conference = factory('App\Conference')->create();

        $dbConference = Conference::first();

        $this->assertEquals($conference->id, $dbConference->id);
    }

    public function testVenueOutingRelations()
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

        $outingVenue0 = $outings[0]->venue()->first();
        $outingVenue1 = $outings[1]->venue()->first();
        $this->assertEquals($outingVenue0, $outingVenue1);
    }

    public function testOutingAdminRelation()
    {
        $outing = factory('App\Outing')->create();
        $admin = factory('App\User')->create();
        $outing->admin()->associate($admin);

        $dbAdmin = $outing->admin()->get();

        $this->assertEquals($admin->lists('id')->all(), $dbAdmin->lists('id')->all());
    }

    public function testOutingUserRelation()
    {
        $outing = factory('App\Outing')->create();
        $users = factory('App\User', 3)->create();
        $outing->users()->saveMany($users->all());

        $dbUsers = $outing->users()->get();

        $this->assertEquals($users->lists('id')->all(), $dbUsers->lists('id')->all());
    }

    /**
     * @expectedException ErrorException
     */
    public function testNoUserOutingRelationForNoStalkingAllowed()
    {
        $outing = factory('App\Outing')->create();
        $users = factory('App\User')->create(3);
        $outing->users()->saveMany($users);

        $dbOuting = $users[0]->outing()->first();
    }

    public function testConferenceAdminRelation()
    {
        $conference = factory('App\Conference')->create();
        $admin = factory('App\User')->create();
        $conference->admin()->associate($admin);

        $dbAdmin = $conference->admin()->get();

        $this->assertEquals($admin->lists('id')->all(), $dbAdmin->lists('id')->all());
    }

}
