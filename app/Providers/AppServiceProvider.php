<?php

namespace App\Providers;

use App\Services\Auth\SignIn\ISignIn;
use App\Services\Auth\SignIn\SignIn;
use App\Services\Auth\SignOut\ISignOut;
use App\Services\Auth\SignOut\SignOut;
use App\Services\Auth\SignUp\ISignUp;
use App\Services\Auth\SignUp\SignUp;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        app()->bind(ISignIn::class, function($app) {
            return new SignIn();
        });
        
        app()->bind(ISignUp::class, function($app) {
            return new SignUp();
        });

        app()->bind(ISignOut::class, function($app) {
            return new SignOut();
        });
        
    }
}
