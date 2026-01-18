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
        $originalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        $savings = $originalPrice * 0.05;
    
        $storePickup = 10;
    
        $tax = $cartItems->sum(function ($item) {
            return ($item->product->price * $item->quantity) * ($item->product->tax / 100);
        });    
        $total = $originalPrice - $savings + $storePickup + $tax;
    
        return view('cart.index', compact('cartItems', 'originalPrice', 'savings', 'storePickup', 'tax', 'total'));
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

        $originalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $tax = $cartItems->sum(function ($item) {
            return ($item->product->price * $item->quantity) * ($item->product->tax / 100);
        });

        $total = $originalPrice + $tax;

        $invoiceData = [
            'user' => $user,
            'cartItems' => $cartItems,
            'originalPrice' => $originalPrice,
            'tax' => $tax,
            'total' => $total,
            'date' => now()->format('Y-m-d H:i:s'),
        ];
        return view('invoice', compact('invoiceData'));
    }

}