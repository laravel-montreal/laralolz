<?php

class HomeControllerTest extends TestCase
{
    private $homeController;
    private $viewFactoryMock;

    public function setUp()
    {
        parent::setUp();

        $this->viewFactoryMock = Mockery::mock('\Illuminate\Contracts\View\Factory');
        $this->homeController = new \App\Http\Controllers\HomeController($this->viewFactoryMock);
    }

    public function testWhenRequestingHome_TheHomeViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.home')->andReturn('foo');

        $response = $this->homeController->index();

        $this->assertEquals('foo', $response);
    }

    public function testWhenRequestingLoggedIn_TheHLoggedInViewIsReturned()
    {
        $this->viewFactoryMock->shouldReceive('make')->once()->with('atomic.pages.logged-in')->andReturn('foo');

        $response = $this->homeController->loggedIn();

        $this->assertEquals('foo', $response);
    }
}
