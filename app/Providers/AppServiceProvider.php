<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Services\UserService::class, \App\Services\BaseUserService::class);
        $this->app->bind(\App\Services\EstimateService::class, \App\Services\BaseEstimateService::class);
        $this->app->bind(\App\Services\GameService::class, \App\Services\BaseGameService::class);
        $this->app->bind(\App\Services\RoundService::class, \App\Services\BaseRoundService::class);
    }
}
