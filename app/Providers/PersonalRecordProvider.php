<?php

namespace App\Providers;

use App\Http\Controllers\PersonalRecordController;
use App\Http\Repository\PersonalRecordRepository;
use App\Http\Service\PersonalRecordService;
use Illuminate\Support\ServiceProvider;

class PersonalRecordProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(PersonalRecordController::class)
            ->needs(PersonalRecordService::class)
            ->give(function () {
                return new PersonalRecordService($this->app->make(PersonalRecordRepository::class));
            });

        $this->app->when(PersonalRecordService::class)
            ->needs(PersonalRecordRepository::class)
            ->give(function () {
                return new PersonalRecordRepository();
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
