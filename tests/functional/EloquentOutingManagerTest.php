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
    
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh', ['--env' => 'testing']);

        $this->manager = new \App\Managers\EloquentOutingManager(new Outing());
        
        $outings = [];
        $outings[] = $this->upcomingOuting = factory('App\Outing')->create([
            'title' => 'Le-sapin-a-des-boules-1',
            'start_date' => Carbon::maxValue(),
            'end_date' => Carbon::maxValue(),
        ]);
        $outings[] = $this->endedOuting = factory('App\Outing')->create([
            'title' => 'Le-sapin-a-des-boules-2',
            'start_date' => Carbon::minValue(),
            'end_date' => Carbon::minValue(),
        ]);
        $outings[] = $this->activeOuting = factory('App\Outing')->create([
            'title' => 'Le-sapin-a-des-boules-3',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::maxValue(),
        ]);
        $outings = collect($outings);
        
        $conference = factory('App\Conference')->create([
            'slug' => 'Kevin-nest-pas-la',
        ]);
        $conference->outings()->saveMany($outings);
    }
    
    public function testItReturnsMultipleOutings(){
        $outings = $this->manager->getUpcomingByConference($conference);
        
        $this->assertInstanceOf('\App\Outing', $outings[0]);
        $this->assertInstanceOf('\App\Outing', $outings[1]);
    }
    
    public function testItDoesNotReturnEndedOutings(){
        $outings = $this->manager->getUpcomingByConference($conference);
        
        
        $this->assertNotContains($outings, $this->endedOuting);
    }
    
    public function testItOrdersOutingsByStartTime(){
        $outings = $this->manager->getUpcomingByConference($conference);
        
        $this->assertEquals($this->activeOuting, $outings[0]);
        $this->assertEquals($this->upcomingOuting, $outings[1]);
    }
}
