<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Pagination\Paginator;

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
    public function boot(UrlGenerator $url)
    {
        // $url->forceScheme('https');
        Paginator::useBootstrap();
        if (\App::environment(['production'])) {
            \URL::forceScheme('https');
        }
        // if (request()->isSecure()) {
        //     \URL::forceScheme('https');
        // }
    }
}
