<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Models\Product;

use function Pest\Livewire\livewire;

it('can render list page', function (): void {
    $this->get(ProductResource::getUrl('index'))
        ->assertSuccessful()
        ->assertSeeLivewire(ListProducts::class);
});

it('can list products', function (): void {
    $posts = Product::factory()->count(5)->create()->fresh();

    livewire(ListProducts::class)
        ->assertCanSeeTableRecords($posts)
        ->assertTableColumnExists('name');
});
