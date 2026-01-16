<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'price',
    ];

    protected $casts = [
        'qty' => 'integer',
        'price' => 'decimal:2',
    ];

    public $timestamps = false;

    public function stockIns(): HasMany
    {
        return $this->hasMany(StockIn::class);
    }

    public function stockOuts(): HasMany
    {
        return $this->hasMany(StockOut::class);
    }
}
