<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Family;
use App\Settlements\UniversalBooleanFilterSettlement;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {
        // 1. Generate headers
        $headers = Subcategory::indexHeaders();

        // 2. Build query
        $query = Subcategory::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $subcategories = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.subcategories.index', array_merge(
            [
                'subcategories' => $subcategories,
                'headers'  => $headers,
            ],
            $this->getLookups()
        ));
    }

    private function getLookups(): array
    {
        return [
            'categories' => Category::orderBy('name')->get(),
            'families' => Family::orderBy('name')->get(),
        ];
    }


    public function show(Subcategory $subcategory)
    {
        $subcategory->load('category');

        return view('reference.subcategories.show', [
            'subcategory' => $subcategory,
        ]);
    }

    public function create()
    {
        return view('reference.subcategories.create', [
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
        return view('reference.subcategories.edit', [
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
