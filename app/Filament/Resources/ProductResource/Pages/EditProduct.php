<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

final class EditProduct extends EditRecord
{
    /**
     * The linked Resource class name.
     */
    protected static string $resource = ProductResource::class;

    /**
     * Defined header actions.
     *
     * @return Actions\DeleteAction[]
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
