<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('name')->paginate(25);

        return view('locations.index', [
            'locations' => $locations,
        ]);
    }

    public function show(Location $location)
    {
        return view('locations.show', [
            'location' => $location,
        ]);
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:locations,name',
            'description' => 'nullable|string|max:500',
            'active'      => 'boolean',
        ]);

        $location = Location::create($validated);

        return redirect()
            ->route('locations.show', $location->id)
            ->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('locations.edit', [
            'location' => $location,
        ]);
    }

    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:locations,name,' . $location->id,
            'description' => 'nullable|string|max:500',
            'active'      => 'boolean',
        ]);

        $location->update($validated);

        return redirect()
            ->route('locations.show', $location->id)
            ->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()
            ->route('locations.index')
            ->with('success', 'Location deleted successfully.');
    }
}
