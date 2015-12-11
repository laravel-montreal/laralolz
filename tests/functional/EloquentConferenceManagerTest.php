<?php

use App\Outing;
use App\Conference;
use Carbon\Carbon;

class EloquentConferenceManagerTest extends TestCase
{
    private $manager;
    
    private $conference;
    
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh', ['--env' => 'testing']);

        $this->manager = new \App\Managers\EloquentConferenceManager(new Conference());
		
        $this->conference = factory('App\Conference')->create([
            'slug' => 'Kevin-nest-pas-la',
        ]);
    }
    
    public function testGetBySlugReturnsExistingConference(){
        $conference = $this->manager->getBySlug('Kevin-nest-pas-la');
        
        $this->assertEquals($this->conference->id, $conference->id);
    }
	
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
	public function testGetBySlugThrowsWhenNoSuchConference(){
        $conference = $this->manager->getBySlug('Kevin-a-pris-le-bon-avion');
    }
}
