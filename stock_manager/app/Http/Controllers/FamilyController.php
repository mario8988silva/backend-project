<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {

        // 1. Generate headers
        $headers = Family::indexHeaders();

        // 2. Build query
        $query = Family::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $families = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.families.index', array_merge(
            [
                'families' => $families,
                'headers'  => $headers,
            ],
        ));
    }

    public function show(Family $family)
    {
        return view('reference.families.show', [
            'family' => $family,
        ]);
    }

    public function create()
    {
        return view('reference.families.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:families,name',
            'active' => 'boolean',
        ]);

        $family = Family::create($validated);

        return redirect()
            ->route('families.show', $family->id)
            ->with('success', 'Family created successfully.');
    }

    public function edit(Family $family)
    {
        return view('reference.families.edit', [
            'family' => $family,
        ]);
    }

    public function update(Request $request, Family $family)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:families,name,' . $family->id,
            'active' => 'boolean',
        ]);

        $family->update($validated);

        return redirect()
            ->route('families.show', $family->id)
            ->with('success', 'Family updated successfully.');
    }

    public function destroy(Family $family)
    {
        $family->delete();

        return redirect()
            ->route('families.index')
            ->with('success', 'Family deleted successfully.');
    }
}
