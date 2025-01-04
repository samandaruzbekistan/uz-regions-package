<?php

namespace Samandaruzbekistan\UzRegionsPackage\commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateAndSeed extends Command
{
    // Command name and description
    protected $signature = 'uz-regions:migrate-and-seed';
    protected $description = 'Run migrations and seeders in one command';

    // Execute the console command
    public function handle()
    {
        // Run migrations
        $this->info('Running migrations...');
        Artisan::call('migrate', ['--force' => true]);

        // Run seeders
        $this->info('Running seeders...');
        Artisan::call('db:seed', ['--class' => 'Samandaruzbekistan\UzRegionsPackage\Database\Seeders\RegionsSeeder']);

        $this->info('Migrations and seeders completed successfully!');
    }
}
