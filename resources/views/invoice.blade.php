@include('nav')
    <div class="max-w-4xl mx-auto my-10 bg-white p-8 rounded-lg shadow-lg border border-gray-200 print:shadow-none print:border-none print:m-0 print:p-0 print:w-full print:max-w-full">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Purchase Invoice</h1>
            <p class="text-gray-600">Invoice Date: {{ $invoiceData['date'] }}</p>
        </div>

        <div class="mb-8 p-4 bg-gray-50 rounded border border-gray-200 print:bg-transparent print:border-none print:p-0">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Buyer Information:</h3>
            <p class="text-gray-700 text-sm mb-1"><strong class="font-medium text-gray-900">Name:</strong> {{ $invoiceData['user']->name }}</p>
            <p class="text-gray-700 text-sm"><strong class="font-medium text-gray-900">Email:</strong> {{ $invoiceData['user']->email }}</p>
        </div>

        <div class="overflow-x-auto mb-8">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 print:bg-gray-200">
                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">Product</th>
                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">Quantity</th>
                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">Price</th>
                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">Tax</th>
                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoiceData['cartItems'] as $item)
                    @php
                        $price = $item->product->offer_price ?? $item->product->price;
                    @endphp
                    <tr class="text-gray-700 text-sm hover:bg-gray-50 print:hover:bg-transparent">
                        <td class="border border-gray-300 px-4 py-3">{{ $item->product->name }}</td>
                        <td class="border border-gray-300 px-4 py-3">{{ $item->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-3">${{ number_format($price, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-3">${{ number_format(($price * $item->quantity) * ($item->product->tax / 100), 2) }}</td>
                        <td class="border border-gray-300 px-4 py-3">${{ number_format($price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col items-end space-y-2 text-gray-800 border-t pt-4 print:mt-4">
            <p class="text-sm">Total Price: <span class="font-medium">${{ number_format($invoiceData['originalPrice'], 2) }}</span></p>
            <p class="text-sm">Tax: <span class="font-medium">${{ number_format($invoiceData['tax'], 2) }}</span></p>
            <p class="text-xl font-bold border-t border-gray-300 mt-2 pt-2">Final Total: ${{ number_format($invoiceData['total'], 2) }}</p>
        </div>

        <div class="mt-8 flex justify-center gap-5 items-center print:hidden">
            <button onclick="window.print()" class="w-[200px] h-[45px] bg-gray-500 hover:bg-gray-600 text-white font-bold rounded shadow transition duration-200 flex items-center justify-center text-sm">
                Print Invoice
            </button>
            
            <form action="{{ route('cart.placeOrder') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="w-[200px] h-[45px] bg-green-500 hover:bg-green-600 text-white font-bold rounded shadow transition duration-200 flex items-center justify-center text-sm">
                    Confirm Purchase
                </button>
            </form>
        </div>
    </div>

