<?php

class VenueControllerTest extends TestCase
{
    private $venueController;
    private $viewFactoryMock;
    public function setUp()
    {
        parent::setUp();

        $this->viewFactoryMock = Mockery::mock('\Illuminate\Contracts\View\Factory');
        $this->venueController = new \App\Http\Controllers\VenueController($this->viewFactoryMock);
    }
    public function tearDown()
    {
        parent::tearDown();
    }

    public function testWhenRequestingSearch_TheSearchViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.venue.search')->andReturn('foo');

        $response = $this->venueController->search();

        $this->assertEquals('foo', $response);
    }
}