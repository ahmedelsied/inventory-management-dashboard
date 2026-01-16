<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOut extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = [
        'item_id',
        'qty',
        'price',
    ];

    protected $casts = [
        'qty' => 'integer',
        'price' => 'decimal:2',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
