<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::composer(['*'], function ($view) {
            $menu = [
                'Home' => '/',
                'About' => '/about',
                'Contact' => '/contact',
            ];

            $authenticated = false;

            if ($authenticated) {
                $menu = array_merge($menu, [
                    'Dashboard' => '/admin/dashboard',
                    'Movies' => '/admin/movies',
                    'Users' => '/admin/users',
                ]);
            } else {
                $menu = [];
            }

            $view->with('menu', $menu);

            // $view->with('menu', [
            //     'Home' => '/',
            //     'About' => '/about',
            //     'Contact' => '/contact',
            // ]);

            // $authenticated = true;

            // if ($authenticated) {
            //     $view->with('adminMenu', [
            //         'Dashboard' => '/admin/dashboard',
            //         'Movies' => '/admin/movies',
            //         'Users' => '/admin/users',
            //     ]);
            // }
        });
        // View::share('menu', [
        //     'Home' => '/',
        //     'About' => '/about',
        //     'Contact' => '/contact',
        // ]);
    }
}
