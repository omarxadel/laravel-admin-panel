<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Company;
use App\Policies\UserPolicy;
use App\Policies\CompanyPolicy;
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
    }

    protected $policies = [
        User::class => UserPolicy::class,
        Company::class => CompanyPolicy::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
