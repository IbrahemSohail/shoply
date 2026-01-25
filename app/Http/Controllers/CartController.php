<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function calculateTotals($cartItems)
    {
        $originalPrice = $cartItems->sum(function ($item) {
            $price = $item->product->offer_price ?? $item->product->price;
            return $price * $item->quantity;
        });
    
        $savings = $originalPrice * 0.05; // 5% discount policy
        $storePickup = 10;
    
        $tax = $cartItems->sum(function ($item) {
            $price = $item->product->offer_price ?? $item->product->price;
            return ($price * $item->quantity) * ($item->product->tax / 100);
        });    
        
        $total = $originalPrice - $savings + $storePickup + $tax;

        return compact('originalPrice', 'savings', 'storePickup', 'tax', 'total');
    }

    public function index()
    {
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        $cartItems = Cart::with('product')
            ->where('users_id', $user->id)
            ->whereNull('order_id')
            ->get();
            
        $totals = $this->calculateTotals($cartItems);
        
        return view('cart.index', array_merge(['cartItems' => $cartItems], $totals));
    }

    public function store(Request $request, Product $product)
    {
        $user = Auth::user();
        if (!$user) {
            return view('auth.login');
        } else {
            $existingCartItem = Cart::where('users_id', $user->id)
                ->where('products_id', $product->id)
                ->whereNull('order_id')
                ->first();

            if ($existingCartItem) {
                $existingCartItem->update([
                    'quantity' => $existingCartItem->quantity + 1
                ]);
            } else {
                Cart::create([
                    'users_id' => $user->id,
                    'products_id' => $product->id,
                    'quantity' => 1,
                    'order_id' => null
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Added Successfully');
        }
    }
    public function destroy(Cart $cartItems)
    {
        $cartItems->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')
            ->where('users_id', $user->id)
            ->whereNull('order_id')
            ->get();

        $totals = $this->calculateTotals($cartItems);

        $invoiceData = array_merge([
            'user' => $user,
            'cartItems' => $cartItems,
            'date' => now()->format('Y-m-d H:i:s'),
        ], $totals);
        
        return view('invoice', compact('invoiceData'));
    }

    public function placeOrder()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $cartItems = Cart::where('users_id', $user->id)
            ->whereNull('order_id')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty');
        }

        $maxOrderNum = $user->orders()->max('user_order_number') ?? 0;
        $nextOrderNumber = $maxOrderNum + 1;

        $order = Order::create([
            'users_id' => $user->id,
            'order_date' => now(),
            'user_order_number' => $nextOrderNumber,
        ]);

        foreach ($cartItems as $item) {
            $item->update(['order_id' => $order->id]);
        }

        return redirect()->route('home')->with('success', 'Order placed successfully! You can view it in your orders.');
    }
}