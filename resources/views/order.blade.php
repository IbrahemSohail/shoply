
@include('nav')
<div class="container mx-auto mt-6 sm:mt-10 p-4 sm:p-6 bg-white shadow-lg rounded-lg">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h1 class="text-xl sm:text-2xl font-bold text-center sm:text-left">{{ __('Order Details') }}</h1>
        @if (!$orders->isEmpty())
            <form id="reset-history-form" action="{{ route('orders.reset') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmReset()" class="mt-4 sm:mt-0 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm transition shadow-md">
                    {{ __('Reset History') }}
                </button>
            </form>
        @endif
    </div>

    <script>
        function confirmReset() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this! All your order history will be deleted.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('reset-history-form').submit();
                }
            })
        }
    </script>

    @if ($orders->isEmpty())
        <p class="text-center text-gray-600 text-sm sm:text-base">{{ __("You don't have any orders yet.") }}</p>
    @else
    @foreach ($orders as $order)
        <div class="mb-8 p-4 sm:p-6 border rounded-lg">
                <h2 class="text-lg sm:text-xl font-semibold mb-4">{{ __('Order Id') }} #{{ $order->user_order_number ?? $order->id }}</h2>
                <p class="text-gray-600 text-xs sm:text-sm">{{ __('Order Date') }} {{ $order->order_date }}</p>

                <div class="overflow-x-auto mt-4">
                  <table class="w-full text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-2 sm:px-4 py-2 text-left">{{ __('Product') }}</th>
                            <th class="px-2 sm:px-4 py-2 text-left">{{ __('Quantity') }}</th>
                            <th class="px-2 sm:px-4 py-2 text-left">{{ __('Price') }}</th>
                            <th class="px-2 sm:px-4 py-2 text-left">{{ __('Total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->carts as $cart)
                            @php
                                $price = $cart->product->offer_price ?? $cart->product->price;
                            @endphp
                            <tr class="border-t">
                                <td class="px-2 sm:px-4 py-2">{{ $cart->product->name }}</td>
                                <td class="px-2 sm:px-4 py-2">{{ $cart->quantity }}</td>
                                <td class="px-2 sm:px-4 py-2">${{ number_format($price, 2) }}</td>
                                <td class="px-2 sm:px-4 py-2">${{ number_format($price * $cart->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="mt-4 text-right">
                    <p class="text-base sm:text-lg font-semibold">{{ __('Total') }}: ${{ number_format($order->carts->sum(function ($cart) {
                        $price = $cart->product->offer_price ?? $cart->product->price;
                        return $price * $cart->quantity;
                    }), 2) }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
