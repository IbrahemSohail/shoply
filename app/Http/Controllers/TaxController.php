<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxController extends Controller
{
    public function index()
    {
        $taxes = Tax::all();
        return view('taxes.index', compact('taxes'));
    }

    public function create()
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }
        return view('taxes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'percent' => 'required|numeric|min:0|max:100'
        ]);

        Tax::create($validated);
        return redirect()->route('taxes.index')->with('success', 'Added Successfully');
    }

    public function show(Tax $tax)
    {
        return view('taxes.show', compact('tax'));
    }

    public function edit(Tax $tax)
    {
        return view('taxes.edit', compact('tax'));
    }

    public function update(Request $request, Tax $tax)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'percent' => 'required|numeric|min:0|max:100'
            ]);

        $tax->update($validated);
        return redirect()->route('taxes.index')->with('success', 'Updated Successfully');
    }

    public function destroy(Tax $tax)
    {
        $tax->delete();
        return redirect()->route('taxes.index')->with('success', 'Deleted Successfully');
    }
}

