<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Stock Out #{{ $stockOut->id }}</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #111827;
                margin: 24px;
            }
            h1 {
                margin: 0 0 4px;
                font-size: 20px;
            }
            .muted {
                color: #6b7280;
                font-size: 12px;
            }
            .card {
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 16px;
                margin-top: 16px;
            }
            .row {
                display: flex;
                justify-content: space-between;
                padding: 6px 0;
                border-bottom: 1px solid #f3f4f6;
            }
            .row:last-child {
                border-bottom: none;
            }
            .label {
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <h1>Stock Out Order</h1>
        <div class="muted">Order #{{ $stockOut->id }}</div>

        <div class="card">
            <div class="row">
                <div class="label">Item</div>
                <div>{{ $stockOut->item->name }}</div>
            </div>
            <div class="row">
                <div class="label">Quantity</div>
                <div>{{ $stockOut->qty }}</div>
            </div>
            <div class="row">
                <div class="label">Unit Price</div>
                <div>{{ number_format((float) $stockOut->price, 2) }}</div>
            </div>
            <div class="row">
                <div class="label">Withdrawn At</div>
                <div>{{ $stockOut->created_at->format('Y-m-d H:i') }}</div>
            </div>
        </div>
    </body>
</html>
