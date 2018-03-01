<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function() {

            return auth()->check() && auth()->user()->isAdmin();
            //SI ESTA CONECTADO        SI EL METODO isAdmin es vertadero
            //return optional(auth()->user()->isAdmin());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
