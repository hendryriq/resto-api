<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt - Order #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info table {
            width: 100%;
        }
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .items th {
            background-color: #f0f0f0;
            padding: 8px;
            text-align: left;
            border-bottom: 2px solid #000;
        }
        .items td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .items .text-right {
            text-align: right;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 2px solid #000;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>RESTAURANT RECEIPT</h1>
        <p>Thank you for dining with us!</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td><strong>Order ID:</strong></td>
                <td>#{{ $order->id }}</td>
            </tr>
            <tr>
                <td><strong>Table:</strong></td>
                <td>{{ $order->table->table_number }}</td>
            </tr>
            <tr>
                <td><strong>Date:</strong></td>
                <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
            </tr>
            <tr>
                <td><strong>Server:</strong></td>
                <td>{{ $order->user->name }}</td>
            </tr>
        </table>
    </div>

    <table class="items">
        <thead>
            <tr>
                <th>Item</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Price</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->food->name }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total: Rp {{ number_format($order->total, 0, ',', '.') }}
    </div>

    <div class="footer">
        <p>Printed on {{ now()->format('d M Y, H:i:s') }}</p>
        <p>This is a computer-generated receipt</p>
    </div>
</body>
</html>
