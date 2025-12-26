<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $query = Location::with('stocks');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        $locations = $query->paginate(20)->withQueryString();

        return view('operations.locations.index', compact('locations'));
    }


    public function show(Location $location)
    {
        return view('operations.locations.show', [
            'location' => $location,
        ]);
    }

    public function create()
    {
        return view('operations.locations.create');
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
            ->route('operations.locations.show', $location->id)
            ->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('operations.locations.edit', [
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
            ->route('operations.locations.show', $location->id)
            ->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()
            ->route('operations.locations.index')
            ->with('success', 'Location deleted successfully.');
    }
}
