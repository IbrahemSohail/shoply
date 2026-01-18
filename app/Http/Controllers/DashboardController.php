<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    function view(){
        $products = Product::with('category')->get();
        $categories = Category::all();
        $taxes = Tax::all();
        return view('dashboard', compact('products', 'categories', 'taxes'));
    }
}