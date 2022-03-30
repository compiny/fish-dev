<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AuthServiceProvider extends ServiceProvider
{
    /*
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];
    */


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
        */
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
