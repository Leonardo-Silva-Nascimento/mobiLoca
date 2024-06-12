<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Route::group([
            'middleware' => 'api',
            'prefix' => 'oauth',
            'namespace' => '\Laravel\Passport\Http\Controllers',
        ], function ($router) {
            $router->post('/token', [
                'uses' => 'AccessTokenController@issueToken',
                'as' => 'passport.token',
                'middleware' => 'throttle',
            ]);
        });
    }
}
