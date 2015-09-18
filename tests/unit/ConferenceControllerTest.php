<?php

class ConferenceControllerTest extends TestCase
{
    private $conferenceController;
    private $viewFactoryMock;

    public function setUp()
    {
        parent::setUp();

        $this->viewFactoryMock = Mockery::mock('\Illuminate\Contracts\View\Factory');
        $this->conferenceController = new \App\Http\Controllers\ConferenceController($this->viewFactoryMock);
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testWhenRequestingConference_TheConferenceViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.conference.index')->andReturn('foo');

        $response = $this->conferenceController->index();

        $this->assertEquals('foo', $response);
    }

    public function testWhenRequestingConferenceCreate_TheConferenceCreateViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.conference.create')->andReturn('foo');

        $response = $this->conferenceController->create();

        $this->assertEquals('foo', $response);
    }
}
