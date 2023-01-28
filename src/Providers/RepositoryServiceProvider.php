<?php

namespace Tendou1618\TendouRepository\Providers;

use Illuminate\Support\ServiceProvider;
use Tendou1618\TendouRepository\Eloquent\BaseRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/repositories.php', 'repositories'
        );

        // Get caching
        // BaseRepository::setCacheInstance($this->app['cache']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/../../config/repositories.php' => config_path('repositories.php')
        ], 'config');
    }
}
