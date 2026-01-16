<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('qty')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->required(),
                TextInput::make('price')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->required(),
            ]);
    }
}
