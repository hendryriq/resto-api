<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt #{{ $order->id }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            background-color: #fff;
            color: #000;
        }

        .receipt-container {
            width: 100%;
            max-width: 80mm;
            margin: 0 auto;
            padding: 10px;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-left { text-align: left; }
        .bold { font-weight: bold; }
        .uppercase { text-transform: uppercase; }

        .dashed-line {
            border-top: 1px dashed #000;
            margin: 10px 0;
            width: 100%;
        }
        .solid-line {
            border-top: 1px solid #000;
            margin: 10px 0;
            width: 100%;
        }

        .header {
            margin-bottom: 15px;
        }
        .header h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .header p {
            font-size: 10px;
            line-height: 1.2;
        }

        .meta-info {
            font-size: 11px;
            margin-bottom: 10px;
        }
        .meta-info table {
            width: 100%;
        }
        .meta-info td {
            padding: 2px 0;
            vertical-align: top;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        .items-table th {
            text-align: left;
            padding-bottom: 5px;
            border-bottom: 1px dashed #000;
        }
        .items-table td {
            padding: 5px 0;
        }
        
        .item-name {
            display: block;
            margin-bottom: 2px;
        }
        .item-details {
            display: flex;
            justify-content: space-between;
        }

        .totals {
            margin-top: 10px;
            font-size: 12px;
        }
        .totals table {
            width: 100%;
        }
        .totals td {
            padding: 3px 0;
        }
        .grand-total {
            font-size: 16px;
            font-weight: bold;
            margin-top: 5px;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            text-align: center;
        }

        @media print {
            body { margin: 0; }
            .receipt-container { 
                width: 100%; 
                max-width: none; 
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header text-center">
            <h1 class="uppercase">Restaurant POS</h1>
            <p>Jl. Jendral Sudirman No. 123</p>
            <p>Jakarta Selatan, Indonesia</p>
            <p>Telp: (021) 555-0123</p>
        </div>

        <div class="dashed-line"></div>

        <div class="meta-info">
            <table>
                <tr>
                    <td>Date: {{ $order->created_at->format('d/m/Y') }}</td>
                    <td class="text-right">Time: {{ $order->created_at->format('H:i') }}</td>
                </tr>
                <tr>
                    <td>Order #: <strong>{{ $order->id }}</strong></td>
                    <td class="text-right">Table: {{ $order->table->table_number }}</td>
                </tr>
                <tr>
                    <td colspan="2">Server: {{ $order->user->name }}</td>
                </tr>
            </table>
        </div>

        <div class="dashed-line"></div>

        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 45%;">Item</th>
                    <th style="width: 15%;" class="text-center">Qty</th>
                    <th style="width: 20%;" class="text-right">Price</th>
                    <th style="width: 20%;" class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td colspan="4">
                        <span class="item-name">{{ $item->food->name }}</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-center">x{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="dashed-line"></div>

        <div class="totals">
            <table>
                <tr class="grand-total">
                    <td>TOTAL</td>
                    <td class="text-right">$ {{ number_format($order->total, 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td style="padding-top: 10px;">Payment</td>
                    <td style="padding-top: 10px;" class="text-right">CASH</td>
                </tr>
            </table>
        </div>

        <div class="dashed-line"></div>

        <div class="footer">
            <p class="bold">THANK YOU FOR VISITING!</p>
            <p style="margin-top: 10px;">Please come again</p>
            
            <div style="margin-top: 15px; font-family: 'Libre Barcode 39', cursive; font-size: 24px;">
                *{{ $order->id }}*
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>