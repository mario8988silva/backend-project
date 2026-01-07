<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Settlements\UniversalBooleanFilterSettlement;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalBooleanFilterSettlement $booleanSettlement, UniversalFilterSettlement $filterSettlement)
    {
        // 1. Generate headers
        $headers = Brand::indexHeaders();

        // 2. Build query
        $query = Brand::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 5. Apply boolean filters
        $booleanSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $brands = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.brands.index', array_merge(
            [
                'brands' => $brands,
                'headers'  => $headers,
            ],
        ));
    }

    public function show(Brand $brand)
    {
        return view('reference.brands.show', [
            'brand' => $brand,
        ]);
    }

    public function create()
    {
        return view('reference.brands._form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:brands,name',
            'active' => 'boolean',
        ]);

        $brand = Brand::create($validated);

        return redirect()
            ->route('brands.show', $brand->id)
            ->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('reference.brands._form', [
            'brand' => $brand,
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'active' => 'boolean',
        ]);

        $brand->update($validated);

        return redirect()
            ->route('brands.show', $brand->id)
            ->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
