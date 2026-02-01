<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('config', [
            'title' => 'Movie App',
            'year' => date('Y'),
            'author' => 'Cuncis',
            'theme' => 'dark',
        ]);
    }
}
