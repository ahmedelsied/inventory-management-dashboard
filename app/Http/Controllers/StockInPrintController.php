<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use Illuminate\Contracts\View\View;

class StockInPrintController
{
    public function __invoke(StockIn $stockIn): View
    {
        $stockIn->load('item');

        return view('stock-ins.print', [
            'stockIn' => $stockIn,
        ]);
    }
}
