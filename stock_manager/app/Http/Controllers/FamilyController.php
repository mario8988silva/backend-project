<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $families = Family::orderBy('name')->paginate(25);

        return view('families.index', [
            'families' => $families,
        ]);
    }

    public function show(Family $family)
    {
        return view('families.show', [
            'family' => $family,
        ]);
    }

    public function create()
    {
        return view('families.create');
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
        return view('families.edit', [
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
