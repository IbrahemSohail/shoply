<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Order;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        try {
            /** @var User $user */
            $user = Auth::user();
            if (!$user) {
                return redirect()->route('login');
            }
            DB::beginTransaction();
            
            $maxOrderNum = $user->orders()->max('user_order_number') ?? 0;
            $nextOrderNumber = $maxOrderNum + 1;

            $order = $user->orders()->create([
                'users_id' => $user->id, 
                'order_date' => now(),
                'user_order_number' => $nextOrderNumber,
            ]);
            $user->carts()->whereNull('order_id')->update(['order_id' => $order->id]);
            DB::commit(); 
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error processing order');
        }       
        
        return redirect()->route('order');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $order = Order::where('users_id', Auth::user()->id)
                        ->with('carts')
                        ->get();
        return view('order', ['orders' => $order]);
    }

    public function reset()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $orders = Order::where('users_id', $user->id)->get();
        
        foreach ($orders as $order) {
            $order->carts()->delete(); // Delete history items
            $order->delete(); // Delete the order record
        }

        return redirect()->route('order')->with('success', 'All orders have been reset.');
    }
}