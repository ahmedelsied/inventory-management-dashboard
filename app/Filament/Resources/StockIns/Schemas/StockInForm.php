<?php

namespace App\Filament\Resources\StockIns\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StockInForm
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
            ]);
    }
}
