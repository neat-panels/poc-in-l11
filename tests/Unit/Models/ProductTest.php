<?php

declare(strict_types=1);

use App\Models\Product;

test('to array', function (): void {
    $product = Product::factory()->create()->refresh();

    expect(array_keys($product->toArray()))
        ->toBe([
            'id',
            'name',
            'description',
            'price',
            'stock',
            'status',
            'created_at',
            'updated_at',
        ]);
});
