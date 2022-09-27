<?php

namespace App\Providers;

use App\View\Composers\WelcomeComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewWelcomeProvider extends ServiceProvider
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
        // // Using class based composers...
        // View::composer('profile', ProfileComposer::class);

        // Using closure based composers...
        View::composer('welcome', WelcomeComposer::class );
    }
}
