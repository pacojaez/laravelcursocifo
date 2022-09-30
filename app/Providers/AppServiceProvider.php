<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // URL::setKeyResolver( fn()=> 'NuestraClavePersonalParaRutasFirmadas');
        URL::setKeyResolver( fn()=> config('app.custom_route_key'));
    }
}
