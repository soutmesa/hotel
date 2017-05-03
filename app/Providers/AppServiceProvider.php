<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\RoleRepository;
use App\Repositories\EloquentRole;

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
        $this->app->singleton(RoleRepository::class, EloquentRole::class);
    }
}
