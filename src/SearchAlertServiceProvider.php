<?php

namespace Fevrok\SearchAlert;

use Illuminate\Support\ServiceProvider;

class SearchAlertServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'fevrok');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'fevrok');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/searchalert.php', 'searchalert');

        // Register the service the package provides.
        // $this->app->singleton('searchalert', function ($app) {
        //     return new SearchAlert;
        // });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['SearchAlert'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/searchalert.php' => config_path('searchalert.php'),
        ], 'searchalert.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fevrok'),
        ], 'search-alert.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fevrok'),
        ], 'search-alert.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fevrok'),
        ], 'search-alert.views');*/

        // Registering package commands.
        $this->commands([
            Console\Commands\SearchAlertCommand::class,
        ]);
    }
}
