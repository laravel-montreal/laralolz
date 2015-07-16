<?php

namespace app;

use App\Drivers\SocialiteTwitter;
use App\Managers\UserManagerInterface;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateUser
{
    private $users;
    private $socialiteTwitter;
    private $auth;

    public function __construct(UserManagerInterface $users, SocialiteTwitter $socialiteTwitter, Guard $auth)
    {
        $this->users = $users;
        $this->socialiteTwitter = $socialiteTwitter;
        $this->auth = $auth;
    }

    public function execute($hasToken)
    {
        if (!$hasToken) {
            return $this->getAuthorisationFirst();
        }
        $user = $this->users->findByUsernameOrCreate($this->getTwitterUser());
        $this->auth->login($user, true);
        return redirect()->intended('/home');
    }

    private function getAuthorisationFirst()
    {
        return $this->socialiteTwitter->redirect();
    }

    private function getTwitterUser()
    {
        return $this->socialiteTwitter->user();
    }
}
