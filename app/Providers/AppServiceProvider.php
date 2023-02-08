<?php

namespace App\Providers;

use App\Models\Employer;
use App\Models\EmployersPermission;
use App\Models\EmployersPosition;

use App\Observers\EmployerObserver;
use App\Observers\EmployersPermissionObserver;
use App\Observers\EmployersPositionObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
//endowing models with observatories
        Employer::observe(EmployerObserver::class);
        EmployersPermission::observe(EmployersPermissionObserver::class);
        EmployersPosition::observe(EmployersPositionObserver::class);
    }
}
