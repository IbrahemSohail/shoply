<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
        // return view('categories.partials.list', compact('categories')); 
    }
    
    public function home(Category $category)
    {
        $categories = Category::paginate(3); 
        return view('home', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image_path' => 'required|image',
        ]);

        $imagePath = $request->file('image_path')->store('categories', 'public');

        Category::create([
            'name' => $request->name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->update(['image_path' => $imagePath]);
        }
    
        return redirect()->route('categories.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
public function search(Request $request)
{
    $query = $request->input('query');

    $categories = Category::where('name', 'LIKE', "%{$query}%")
        ->limit(5)
        ->get();

    return response()->json([
        'categories' => $categories
    ]);
}
}


