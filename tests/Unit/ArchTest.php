<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\Factory;

arch()->preset()->php();
arch()->preset()->laravel()->ignoring('App\Providers');
arch()->preset()->security();

arch('controllers')
    ->expect('App\Http\Controllers')
    ->not->toBeUsed();

arch('avoid mutation')
    ->expect('App')
    ->classes()
    ->toBeReadonly()
    ->ignoring([
        'App\Filament',
        'App\Exceptions',
        'App\Jobs',
        'App\Models',
        'App\Providers',
        'App\Services',
    ]);

arch('avoid inheritance')
    ->expect('App')
    ->classes()
    ->toExtendNothing()
    ->ignoring([
        'App\Filament',
        'App\Models',
        'App\Exceptions',
        'App\Jobs',
        'App\Providers',
        'App\Services',
    ]);

arch('annotations')
    ->expect('App')
    ->toHavePropertiesDocumented()
    ->toHaveMethodsDocumented();

arch('avoid open for extension')
    ->expect('App')
    ->classes()
    ->toBeFinal();

arch('avoid abstraction')
    ->expect('App')
    ->not->toBeAbstract();

arch('factories')
    ->expect('Database\Factories')
    ->toExtend(Factory::class)
    ->toHaveMethod('definition')
    ->toOnlyBeUsedIn([
        'App\Models',
    ]);

arch('models')
    ->expect('App\Models')
    ->toHaveMethod('casts')
    ->toOnlyBeUsedIn([
        'App\Filament',
        'App\Http',
        'App\Jobs',
        'App\Models',
        'App\Providers',
        'App\Actions',
        'App\Services',
        'Database\Factories',
        'Database\Seeders',
    ]);

arch('actions')
    ->expect('App\Actions')
    ->toHaveMethod('handle');

arch('user is filament user')
    ->expect(App\Models\User::class)
    ->toImplement(Filament\Models\Contracts\FilamentUser::class);
