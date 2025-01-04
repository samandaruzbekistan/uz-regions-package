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
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/database/seeders' => database_path('seeders'),
        ], 'seeders');

        $this->commands([
            MigrateAndSeed::class,
        ]);
    }

}

//function database_path1($path = '')
//{
//    return __DIR__ . '/database/' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
//}