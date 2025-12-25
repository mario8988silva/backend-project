<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')
            ->orderBy('name')
            ->paginate(25);

        return view('subcategories.index', [
            'subcategories' => $subcategories,
        ]);
    }

    public function show(Subcategory $subcategory)
    {
        $subcategory->load('category');

        return view('subcategories.show', [
            'subcategory' => $subcategory,
        ]);
    }

    public function create()
    {
        return view('subcategories.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id',
            'active'      => 'boolean',
        ]);

        $subcategory = Subcategory::create($validated);

        return redirect()
            ->route('subcategories.show', $subcategory->id)
            ->with('success', 'Subcategory created successfully.');
    }

    public function edit(Subcategory $subcategory)
    {
        return view('subcategories.edit', [
            'subcategory' => $subcategory,
            'categories'  => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:subcategories,name,' . $subcategory->id,
            'category_id' => 'required|exists:categories,id',
            'active'      => 'boolean',
        ]);

        $subcategory->update($validated);

        return redirect()
            ->route('subcategories.show', $subcategory->id)
            ->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()
            ->route('subcategories.index')
            ->with('success', 'Subcategory deleted successfully.');
    }
}
