<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function boot()
    {
        App::setLocale('fr');
    }
    public function register(): void
    {
        //
    }
}
