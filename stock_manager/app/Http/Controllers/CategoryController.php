<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Family;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('family')
            ->orderBy('name')
            ->paginate(25);

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function show(Category $category)
    {
        $category->load('family');

        return view('categories.show', [
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('categories.create', [
            'families' => Family::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255|unique:categories,name',
            'family_id' => 'required|exists:families,id',
            'active'    => 'boolean',
        ]);

        $category = Category::create($validated);

        return redirect()
            ->route('categories.show', $category->id)
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
            'families' => Family::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255|unique:categories,name,' . $category->id,
            'family_id' => 'required|exists:families,id',
            'active'    => 'boolean',
        ]);

        $category->update($validated);

        return redirect()
            ->route('categories.show', $category->id)
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
