@extends('link')
    <title>Purchase invoice</title>
    <style>
        .invoice { width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Purchase invoice</h1>
            <p>Invoice Date: {{ $invoiceData['date'] }}</p>
        </div>

        <div class="details">
            <h3>Buyer Information:</h3>
            <p>Name: {{ $invoiceData['user']->name }}</p>
            <p>Email: {{ $invoiceData['user']->email }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoiceData['cartItems'] as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->product->price, 2) }}</td>
                    <td>${{ number_format(($item->product->price * $item->quantity) * ($item->product->tax / 100), 2) }}</td>
                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <p>Total Price: ${{ number_format($invoiceData['originalPrice'], 2) }}</p>
            <p>Tax: ${{ number_format($invoiceData['tax'], 2) }}</p>
            <p>Final total ${{ number_format($invoiceData['total'], 2) }}</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
