<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateProduct extends CreateRecord
{
    /**
     * The linked Resource class name.
     */
    protected static string $resource = ProductResource::class;
}
