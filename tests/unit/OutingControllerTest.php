<?php

class OutingControllerTest extends TestCase
{
    private $outingController;
    private $viewFactoryMock;
    public function setUp()
    {
        parent::setUp();

        $this->viewFactoryMock = Mockery::mock('\Illuminate\Contracts\View\Factory');
        $this->outingController = new \App\Http\Controllers\OutingController($this->viewFactoryMock);
    }
    public function tearDown()
    {
        parent::tearDown();
    }

    public function testWhenRequestingChoose_TheChooseViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.outing.choose')->andReturn('foo');

        $response = $this->outingController->choose();

        $this->assertEquals('foo', $response);
    }

    public function testWhenRequestingCreate_TheCreateViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.outing.create')->andReturn('foo');

        $response = $this->outingController->create();

        $this->assertEquals('foo', $response);
    }

    public function testWhenRequestingDescription_TheDescriptionViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.outing.description')->andReturn('foo');

        $response = $this->outingController->description();

        $this->assertEquals('foo', $response);
    }

    public function testWhenRequestingOwn_TheOwnViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.outing.own')->andReturn('foo');

        $response = $this->outingController->own();

        $this->assertEquals('foo', $response);
    }
}