<?php
namespace App\Managers;

use Laravel\Socialite\One\User as SocialiteUser;

interface UserManagerInterface
{
    public function findByUsernameOrCreate(SocialiteUser $userData);
}