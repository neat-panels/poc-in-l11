<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ProductStatus: string implements HasLabel
{
    case Activated = 'activated';
    case Deactivated = 'deactivated';

    /**
     * Get the label for the enum value.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::Activated => 'Activated',
            self::Deactivated => 'Deactivated',
        };
    }
}
