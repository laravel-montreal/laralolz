<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Managers\ConferenceManagerInterface',
            'App\Managers\EloquentConferenceManager'
        );
        $this->app->bind(
            'App\Managers\UserManagerInterface',
            'App\Managers\EloquentUserManager'
        );
    }
}
