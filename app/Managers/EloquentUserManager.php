<?php

namespace App\Managers;

use App\User;
use Laravel\Socialite\One\User as SocialiteUser;

class EloquentUserManager extends EloquentManagerBase implements UserManagerInterface
{
    protected $model;

    /**
     * @param Conference $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findByUsernameOrCreate(SocialiteUser $userData)
    {
        $user = $this->model->where('name', $userData->name)->first();
        if (is_null($user)) {
            return $this->model->updateOrCreate(
                [
                    'name' => $userData->nickname,
                ],
                [
                    'name' => $userData->nickname,
                    'email' => $userData->email,
                    'avatar' => $userData->avatar,

                ]
            );

        } else {
            return $user;

        }
    }
}
