<?php

use App\Outing;
use App\Conference;
use Carbon\Carbon;

class EloquentOutingManagerTest extends TestCase
{
    private $manager;
    
    private $endedOuting;
    private $activeOuting;
    private $upcomingOuting;
    
    private $conference;
    
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh', ['--env' => 'testing']);

        $this->manager = new \App\Managers\EloquentOutingManager(new Outing());
        
        $outings = [];
        $outings[] = $this->upcomingOuting = factory('App\Outing')->create([
            'title' => 'Le-sapin-a-des-boules-1',
            'starts_at' => Carbon::maxValue(),
            'ends_at' => Carbon::maxValue(),
        ]);
        $outings[] = $this->endedOuting = factory('App\Outing')->create([
            'title' => 'Le-sapin-a-des-boules-2',
            'starts_at' => Carbon::minValue(),
            'ends_at' => Carbon::minValue(),
        ]);
        $outings[] = $this->activeOuting = factory('App\Outing')->create([
            'title' => 'Le-sapin-a-des-boules-3',
            'starts_at' => Carbon::now(),
            'ends_at' => Carbon::maxValue(),
        ]);
        $outings = collect($outings);
        
        $this->conference = factory('App\Conference')->create();
        $this->conference->outings()->saveMany($outings);
    }
    
    public function testItReturnsMultipleOutings(){
        $outings = $this->manager->getUpcomingForConference($this->conference);
        
        $this->assertInstanceOf('\App\Outing', $outings[0]);
        $this->assertInstanceOf('\App\Outing', $outings[1]);
    }
    
    public function testItDoesNotReturnEndedOutings(){
        $outings = $this->manager->getUpcomingForConference($this->conference);
        
        // Check that the ended outing is not returned
        foreach ($outings as $outing) {
            $this->assertNotEquals($this->endedOuting->id, $outing->id);
        }
    }
    
    public function testItOrdersOutingsByStartTime(){
        $outings = $this->manager->getUpcomingForConference($this->conference);
        
        $this->assertEquals($this->activeOuting->id, $outings[0]->id);
        $this->assertEquals($this->upcomingOuting->id, $outings[1]->id);
    }
}
