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
    // $user = Auth::user();
    // dd($user);

    try {
        $user = User::find(Auth::user()->id);
        DB::beginTransaction();
        $order = $user->orders()->create([
            'users_id' => $user->id, 
            'order_date' => now()
        ]);
        $user->carts()->update(['orders_id' => $order->id]);
        // $user->carts()->delete();
        DB::commit(); 
        } catch (\Exception $e) {
        DB::rollBack();
        }       
        
    return redirect()->route('order');
}

public function index(User $user)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    
    $order = Order::where('users_id',Auth::user()->id)
                    ->with('carts')
                    ->get();
    //  dd($order);
    return view('order', ['orders' => $order]);
}
}