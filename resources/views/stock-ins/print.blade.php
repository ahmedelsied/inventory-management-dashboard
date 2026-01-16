<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Stock In #{{ $stockIn->id }}</title>
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
        <h1>Stock In Order</h1>
        <div class="muted">Order #{{ $stockIn->id }}</div>

        <div class="card">
            <div class="row">
                <div class="label">Item</div>
                <div>{{ $stockIn->item->name }}</div>
            </div>
            <div class="row">
                <div class="label">Quantity</div>
                <div>{{ $stockIn->qty }}</div>
            </div>
            <div class="row">
                <div class="label">Supplied At</div>
                <div>{{ $stockIn->created_at->format('Y-m-d H:i') }}</div>
            </div>
        </div>
    </body>
</html>
