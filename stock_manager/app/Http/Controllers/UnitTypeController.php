<?php

namespace App\Http\Controllers;

use App\Models\UnitType;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
{
    public function index()
    {
        $unitTypes = UnitType::orderBy('name')->paginate(25);

        return view('reference.unit-types.index', [
            'unit_types' => $unitTypes,
        ]);
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
