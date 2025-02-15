<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Models\Product;

use function Pest\Livewire\livewire;

it('can render page', function (): void {
    $this->get(ProductResource::getUrl('edit', [
        'record' => Product::factory()->create(),
    ]))
        ->assertSuccessful()
        ->assertSeeLivewire(EditProduct::class);
});

it('can retrieve data', function (): void {
    $product = Product::factory()->create();

    livewire(EditProduct::class, [
        'record' => $product->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'stock' => $product->stock,
        ]);
});

it('can save', function (): void {
    $product = Product::factory()->create();
    $newData = Product::factory()->make();

    livewire(EditProduct::class, [
        'record' => $product->getRouteKey(),
    ])
        ->fillForm([
            'name' => $newData->name,
            'description' => $newData->description,
            'price' => $newData->price,
            'stock' => $newData->stock,
            'status' => $newData->status,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($product->refresh())
        ->name->toBe($newData->name)
        ->description->toBe($newData->description)
        ->price->toBe($newData->price)
        ->stock->toBe($newData->stock);
});
