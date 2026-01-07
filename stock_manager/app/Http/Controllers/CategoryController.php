<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Family;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {
        // 1. Generate headers
        $headers = Category::indexHeaders();

        // 2. Build query
        $query = Category::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $categories = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.categories.index', [
            'categories' => $categories,
            'headers' => $headers,
            'families' => Family::orderBy('name')->get()->map(fn($f) => [
                'id' => $f->id,
                'name' => $f->name,
            ]),

        ]);
    }


    public function show(Category $category)
    {
        $category->load('family');

        return view('reference.categories.show', [
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('reference.categories.create', [
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
        return view('reference.categories.edit', [
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
