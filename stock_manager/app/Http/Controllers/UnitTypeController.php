<?php

namespace App\Http\Controllers;

use App\Models\UnitType;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {
        // 1. Generate headers
        $headers = UnitType::indexHeaders();

        // 2. Build query
        $query = UnitType::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $unitTypes = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.unit-types.index', array_merge(
            [
                'unit_types' => $unitTypes,
                'headers'  => $headers,
            ],
        ));
    }

    public function show(UnitType $unitType)
    {
        return view('reference.unit-types.show', [
            'unit_type' => $unitType,
        ]);
    }

    public function create()
    {
        return view('reference.unit-types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:unit_types,name',
            'symbol' => 'nullable|string|max:10',
        ]);

        $unitType = UnitType::create($validated);

        return redirect()
            ->route('unit-types.show', $unitType->id)
            ->with('success', 'Unit type created successfully.');
    }

    public function edit(UnitType $unitType)
    {
        return view('reference.unit-types.edit', [
            'unit_type' => $unitType,
        ]);
    }

    public function update(Request $request, UnitType $unitType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:unit_types,name,' . $unitType->id,
            'symbol' => 'nullable|string|max:10',
        ]);

        $unitType->update($validated);

        return redirect()
            ->route('unit-types.show', $unitType->id)
            ->with('success', 'Unit type updated successfully.');
    }

    public function destroy(UnitType $unitType)
    {
        $unitType->delete();

        return redirect()
            ->route('unit-types.index')
            ->with('success', 'Unit type deleted successfully.');
    }
}
