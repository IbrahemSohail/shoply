<?php
namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(40);
        $categories = Category::all(); 
        return view('products.index', compact('products', 'categories'));
    }

    public function create(){
        $categories = Category::all();
        $taxes = Tax::all();
        return view('products.create', compact('categories', 'taxes'));
    
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'size' => 'nullable|string',
            'price' => 'required|numeric',
            'offer_price' => 'nullable|numeric|lt:price',
            'tax' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'tax_id' => 'required|exists:taxes,id',
            'color_id' => 'nullable'

        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image_path'] = $path;
        }

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $taxes = Tax::all();
        return view('products.edit', compact('product', 'categories', 'taxes'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'size' => 'nullable|string',
            'price' => 'required|numeric',
            'offer_price' => 'nullable|numeric|lt:price',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);
    
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }

    public function showByCategory(Category $category)
    {
        $products = $category->products()->paginate(10);
        $categories = Category::all(); 
        return view('products.index', compact('products', 'categories', 'category'));
    }
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }


    public function liveSearch(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('name', 'LIKE', "%{$query}%")
        ->orWhere('description', 'LIKE', "%{$query}%") 
        ->get();


    return response()->json([
        'products' => $products,
    ]);
}
}