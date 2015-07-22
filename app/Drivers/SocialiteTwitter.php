<?php

namespace App\Drivers;

use Laravel\Socialite\Contracts\Factory as Socialite;

class SocialiteTwitter
{

    private $socialite;

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;

    }

    public function redirect()
    {
        return $this->socialite->driver('twitter')->redirect();
    }

    public function user()
    {
        return $this->socialite->driver('twitter')->user();
    }
}
