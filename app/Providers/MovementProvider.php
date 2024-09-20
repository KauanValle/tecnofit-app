<?php

namespace App\Providers;

use App\Http\Controllers\MovementController;
use App\Http\Repository\MovementRepository;
use App\Http\Service\MovementService;
use Illuminate\Support\ServiceProvider;

class MovementProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(MovementController::class)
            ->needs(MovementService::class)
            ->give(function () {
                return new MovementService($this->app->make(MovementRepository::class));
            });

        $this->app->when(MovementService::class)
            ->needs(MovementRepository::class)
            ->give(function () {
                return new MovementRepository();
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
