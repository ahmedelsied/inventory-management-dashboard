<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use Illuminate\Contracts\View\View;

class StockOutPrintController
{
    public function __invoke(StockOut $stockOut): View
    {
        $stockOut->load('item');

        return view('stock-outs.print', [
            'stockOut' => $stockOut,
        ]);
    }
}
