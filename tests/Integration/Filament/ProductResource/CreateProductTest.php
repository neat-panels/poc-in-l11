<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Models\Product;

use function Pest\Livewire\livewire;

it('can render create page', function (): void {
    $this->get(ProductResource::getUrl('create'))
        ->assertSuccessful()
        ->assertSeeLivewire(CreateProduct::class);
});

it('can create', function (): void {
    $newData = Product::factory()->make();

    livewire(CreateProduct::class)
        ->fillForm([
            'name' => $newData->name,
            'description' => $newData->description,
            'price' => $newData->price,
            'stock' => $newData->stock,
            'status' => $newData->status,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Product::class, [
        'name' => $newData->name,
        'description' => $newData->description,
        'price' => $newData->price,
        'stock' => $newData->stock,
        'status' => $newData->status,
    ]);
});
