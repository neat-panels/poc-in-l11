<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

final class ListProducts extends ListRecords
{
    /**
     * The linked Resource class name.
     */
    protected static string $resource = ProductResource::class;

    /**
     * Defined header actions.
     *
     * @return Actions\CreateAction[]
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
