<?php

namespace App\Providers;

use App\Http\Controllers\UserController;
use App\Http\Repository\UserRepository;
use App\Http\Service\UserService;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(UserController::class)
            ->needs(UserService::class)
            ->give(function () {
                return new UserService($this->app->make(UserRepository::class));
            });

        $this->app->when(UserService::class)
            ->needs(UserRepository::class)
            ->give(function () {
                return new UserRepository();
            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
