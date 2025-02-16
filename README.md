[![Tests](https://github.com/neat-panels/poc-in-l11/actions/workflows/tests.yml/badge.svg)](https://github.com/neat-panels/poc-in-l11/actions/workflows/tests.yml)


```cli
npm install && npm run build
composer run dev

composer require filament/filament:"^3.2" -W
php artisan filament:install --panels
php artisan filament:install --panels --no-interaction
php artisan make:filament-user --name Admin --email test@test.com --password password
```