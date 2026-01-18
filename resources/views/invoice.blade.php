@extends('link')
    <title>Purchase invoice</title>
    <style>
        .invoice { 
            w-full;
            max-width: 90%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .header { 
            text-align: center; 
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .header p {
            font-size: 0.875rem;
        }
        .details { 
            margin-bottom: 20px;
        }
        .details h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .details p {
            font-size: 0.875rem;
            margin-bottom: 5px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 8px;
            text-align: left;
        }
        th { 
            background-color: #f2f2f2;
            font-weight: 600;
        }
        .total { 
            margin-top: 20px;
            font-weight: bold;
            text-align: right;
        }
        .total p {
            margin-bottom: 5px;
            font-size: 0.875rem;
        }
        @media print {
            .invoice {
                max-width: 100%;
                margin: 0;
                padding: 0;
                border: none;
            }
        }
        @media (max-width: 640px) {
            .invoice {
                max-width: 100%;
                padding: 15px;
            }
            table {
                font-size: 0.75rem;
            }
            th, td {
                padding: 6px;
            }
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Purchase Invoice</h1>
            <p>Invoice Date: {{ $invoiceData['date'] }}</p>
        </div>

        <div class="details">
            <h3>Buyer Information:</h3>
            <p><strong>Name:</strong> {{ $invoiceData['user']->name }}</p>
            <p><strong>Email:</strong> {{ $invoiceData['user']->email }}</p>
        </div>

        <div style="overflow-x: auto;">
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
        </div>

        <div class="total">
            <p>Total Price: ${{ number_format($invoiceData['originalPrice'], 2) }}</p>
            <p>Tax: ${{ number_format($invoiceData['tax'], 2) }}</p>
            <p>Final Total: ${{ number_format($invoiceData['total'], 2) }}</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>

