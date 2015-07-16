<?php

use App\User;
use Laravel\Socialite\One\User as SocialiteUser;


class EloquentUserManagerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh', ['--env' => 'testing']);


    }
    public function testItCreateUserWhenNotInDatabase(){
        $userData = new SocialiteUser();
        $userData->nickname = 'name';
        $userData->email = 'email@email.com';
        $userData->avatar = 'avatar.jpg';
        $manager = new \App\Managers\EloquentUserManager(new User());
        $manager->findByUsernameOrCreate($userData);
        $bdUser = User::first();
        $this->assertEquals($bdUser->name, $userData->nickname);
    }

    public function testItTakeExistingUserWhenInDatabase(){
        $userData = new SocialiteUser();
        $userData->nickname = 'name';
        $userData->email = 'email@email.com';
        $userData->avatar = 'avatar.jpg';
        $manager = new \App\Managers\EloquentUserManager(new User());
        $bdUser1 = $manager->findByUsernameOrCreate($userData);
        $bdUser2 = $manager->findByUsernameOrCreate($userData);
        $this->assertEquals($bdUser1->id, $bdUser2->id);
    }
}