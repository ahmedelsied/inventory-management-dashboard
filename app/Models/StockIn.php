<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockIn extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = [
        'item_id',
        'qty',
    ];

    protected $casts = [
        'qty' => 'integer',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
