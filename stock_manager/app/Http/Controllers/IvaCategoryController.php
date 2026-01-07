<?php

namespace App\Http\Controllers;

use App\Models\IvaCategory;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class IvaCategoryController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {
        // 1. Generate headers
        $headers = IvaCategory::indexHeaders();

        // 2. Build query
        $query = IvaCategory::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $ivaCategories = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.iva-categories.index', array_merge(
            [
                'iva_categories' => $ivaCategories,
                'headers'  => $headers,
            ],
        ));
    }

    public function show(IvaCategory $ivaCategory)
    {
        return view('reference.iva-categories.show', [
            'iva_category' => $ivaCategory,
        ]);
    }

    public function create()
    {
        return view('reference.iva-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:iva_categories,name',
            'rate'   => 'required|numeric|min:0|max:100',
            'active' => 'boolean',
        ]);

        $ivaCategory = IvaCategory::create($validated);

        return redirect()
            ->route('iva-categories.show', $ivaCategory->id)
            ->with('success', 'IVA category created successfully.');
    }

    public function edit(IvaCategory $ivaCategory)
    {
        return view('reference.iva-categories.edit', [
            'iva_category' => $ivaCategory,
        ]);
    }

    public function update(Request $request, IvaCategory $ivaCategory)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:iva_categories,name,' . $ivaCategory->id,
            'rate'   => 'required|numeric|min:0|max:100',
            'active' => 'boolean',
        ]);

        $ivaCategory->update($validated);

        return redirect()
            ->route('iva-categories.show', $ivaCategory->id)
            ->with('success', 'IVA category updated successfully.');
    }

    public function destroy(IvaCategory $ivaCategory)
    {
        $ivaCategory->delete();

        return redirect()
            ->route('iva-categories.index')
            ->with('success', 'IVA category deleted successfully.');
    }
}
