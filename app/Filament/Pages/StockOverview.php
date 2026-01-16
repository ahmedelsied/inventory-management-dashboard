<?php

namespace App\Filament\Pages;

use App\Models\Item;
use Filament\Pages\Page;

class StockOverview extends Page
{
    protected static ?string $navigationLabel = 'Stock Overview';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?int $navigationSort = 0;

    protected static string|int|null $navigationIcon = 'heroicon-o-chart-bar';

    protected string $view = 'filament.pages.stock-overview';

    public function getViewData(): array
    {
        return [
            'items' => Item::query()
                ->orderBy('name')
                ->get(),
        ];
    }
}
