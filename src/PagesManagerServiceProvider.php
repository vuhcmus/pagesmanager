<?php

namespace Vuhcmus\Pagesmanager;

use Illuminate\Support\ServiceProvider;

class PagesManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes/web.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'pagesmanager');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/pagesmanager'),
        ]);
        $this->publishes([
            __DIR__.'/migrations/' => database_path('migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/pagesmanager'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Vuhcmus\Pagesmanager\Controllers\PageController');
    }
}
