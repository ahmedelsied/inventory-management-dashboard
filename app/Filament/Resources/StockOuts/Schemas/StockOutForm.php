<?php

namespace App\Filament\Resources\StockOuts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StockOutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('item_id')
                    ->label('Item')
                    ->relationship('item', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('qty')
                    ->label('Quantity')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                TextInput::make('price')
                    ->label('Unit Price')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->required(),
            ]);
    }
}
