<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Models\Repositories\Contracts\AuthorRepositoryInterface', 'App\Models\Repositories\AuthorRepository');
        $this->app->bind('App\Models\Repositories\Contracts\BookRepositoryInterface', 'App\Models\Repositories\BookRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Europe/Moscow');
    }
}
