<?php

namespace App\Filament\Resources\StockIns\Pages;

use App\Filament\Resources\StockIns\StockInResource;
use App\Models\Item;
use App\Models\StockIn;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateStockIn extends CreateRecord
{
    protected static string $resource = StockInResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $item = Item::lockForUpdate()->findOrFail($data['item_id']);

            $stockIn = StockIn::create($data);

            $item->increment('qty', $data['qty']);

            return $stockIn;
        });
    }
}
