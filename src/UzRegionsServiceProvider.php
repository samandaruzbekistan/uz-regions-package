<?php

namespace Samandaruzbekistan\UzRegionsPackage;

use Illuminate\Support\ServiceProvider;
use Samandaruzbekistan\UzRegionsPackage\commands\MigrateAndSeed;

class UzRegionsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Seeders
        $this->publishes([
            __DIR__ . '/database/seeders' => database_path('seeders'),
        ], 'seeders');

        // Models
        $this->publishes([
            __DIR__ . '/Models' => app_path('Models'),
        ], 'models');

        // MigrateAndSeed command
        $this->commands([
            MigrateAndSeed::class,
        ]);
    }

}