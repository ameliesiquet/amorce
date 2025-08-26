<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function boot()
    {
        App::setLocale('fr');

        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
    public function register(): void
    {
        //
    }
}
