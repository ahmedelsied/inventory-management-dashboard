<?php

namespace App\Filament\Resources\StockOuts\Tables;

use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StockOutsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item.name')
                    ->label('Item')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('qty')
                    ->label('Quantity')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Unit Price')
                    ->numeric(2)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Withdrawn At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('stock-outs.print', $record))
                    ->openUrlInNewTab(),
            ]);
    }
}
