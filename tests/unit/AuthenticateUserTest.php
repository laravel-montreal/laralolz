<?php

class AuthenticateUserTest extends TestCase
{
    private $userMock;
    private $userManagerMock;
    private $authMock;
    private $socialiteMock;

    public function setUp()
    {
        parent::setUp();
        $this->userMock = Mockery::mock('App\User');
        $this->userManagerMock = Mockery::mock('App\Managers\UserManagerInterface');
        $this->authMock = Mockery::mock('Illuminate\Contracts\Auth\Guard');
        $this->socialiteMock = Mockery::mock('App\Drivers\SocialiteTwitter');
        $this->socialiteUserMock = Mockery::mock('\Laravel\Socialite\One\User');
    }
    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testAuthenticateUserCanBeCreated()
    {
        $authClass = new \App\AuthenticateUser($this->userManagerMock, $this->socialiteMock, $this->authMock, true);
        $this->assertInstanceOf('\App\AuthenticateUser', $authClass);
    }

    public function testRedirectTwitterIfNoToken()
    {
        $hasToken = false;
        $this->socialiteMock->shouldReceive('redirect')->once()->andReturn('testReturnRedirect');
        $authenticateUser = new \App\AuthenticateUser($this->userManagerMock, $this->socialiteMock, $this->authMock, true);
        $return = $authenticateUser->execute($hasToken);
        $this->assertEquals('testReturnRedirect', $return);
    }

    public function testFindByUsernameOrCreateUserAndSendRedirectionIfToken()
    {

        $hasToken = true;
        $this->socialiteMock->shouldReceive('user')->andReturn($this->socialiteUserMock);
        $this->userManagerMock->shouldReceive('findByUsernameOrCreate')->with($this->socialiteMock->user())->once()->andReturn($this->userMock);
        $this->authMock->shouldReceive('login')->with($this->userMock, true);
        $authClass = new \App\AuthenticateUser($this->userManagerMock, $this->socialiteMock, $this->authMock, true);
        $return = $authClass->execute($hasToken);
        $this->assertInstanceOf('Illuminate\Http\RedirectResponse', $return);
    }

}
