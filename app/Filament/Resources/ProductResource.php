<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\ProductStatus;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Override;

final class ProductResource extends Resource
{
    /**
     * The model the resource corresponds to.
     */
    protected static ?string $model = Product::class;

    /**
     * The icon that is used for the resource.
     */
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * The schema of the form.
     */
    #[Override]
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name'),
                Textarea::make('description')
                    ->label('Description'),
                TextInput::make('price')
                    ->label('Price'),
                TextInput::make('stock')
                    ->label('Stock'),
                Select::make('status')
                    ->label('Status')
                    ->options(ProductStatus::class),
            ]);
    }

    /**
     * The schema of the table.
     */
    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('description'),
                TextColumn::make('price'),
                TextColumn::make('stock'),
                TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Summary of relationManagers
     */
    #[Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Pages for this resource.
     */
    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
