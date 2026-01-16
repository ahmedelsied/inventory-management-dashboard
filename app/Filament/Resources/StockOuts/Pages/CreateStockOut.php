<?php

namespace App\Filament\Resources\StockOuts\Pages;

use App\Filament\Resources\StockOuts\StockOutResource;
use App\Models\Item;
use App\Models\StockOut;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateStockOut extends CreateRecord
{
    protected static string $resource = StockOutResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $item = Item::lockForUpdate()->findOrFail($data['item_id']);

            if ($item->qty < $data['qty']) {

                Notification::make()
                    ->title('Insufficient stock')
                    ->body('Insufficient stock for this withdrawal. Available: ' . $item->qty . ', Requested: ' . data_get($data, 'qty'))
                    ->danger()
                    ->send();

                throw ValidationException::withMessages([
                    'qty' => 'Insufficient stock for this withdrawal.',
                ]);
            }

            $stockOut = StockOut::create($data);

            $item->decrement('qty', $data['qty']);

            return $stockOut;
        });
    }
}
