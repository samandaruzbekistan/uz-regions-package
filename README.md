# Uzbekistan regions package for Laravel

This package allows you to import information about Uzbekistan's regions, districts, and villages into your Laravel project.

## Installation

1. Install the package via Composer:
```bash
composer require "samandaruzbekistan/uz-regions-package:1.0"
```

2. Add the ServiceProvider in `config/app.php`:
```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Samandaruzbekistan\UzRegionsPackage\UzRegionsServiceProvider::class,
]
```

3. Publish the necessary files:
```bash
php artisan vendor:publish --provider="Samandaruzbekistan\UzRegionsPackage\UzRegionsServiceProvider" --all
```

4. Migrate and seed command:
```bash
php artisan uz-regions:migrate-and-seed
```

## Support

For support, feedback, or questions, contact the maintainer at: samandarsariboyev69@gmail.com