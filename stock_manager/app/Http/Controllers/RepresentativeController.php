<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use Illuminate\Http\Request;

class RepresentativeController extends Controller
{
    public function index()
    {
        $representatives = Representative::orderBy('name')->paginate(25);

        return view('business.representatives.index', [
            'representatives' => $representatives,
        ]);
    }

    public function show(Representative $representative)
    {
        return view('business.representatives.show', [
            'representative' => $representative,
        ]);
    }

    public function create()
    {
        return view('business.representatives.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'active'     => 'boolean',
        ]);

        $representative = Representative::create($validated);

        return redirect()
            ->route('business.representatives.show', $representative->id)
            ->with('success', 'Representative created successfully.');
    }

    public function edit(Representative $representative)
    {
        return view('business.representatives.edit', [
            'representative' => $representative,
        ]);
    }

    public function update(Request $request, Representative $representative)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'active'     => 'boolean',
        ]);

        $representative->update($validated);

        return redirect()
            ->route('business.representatives.show', $representative->id)
            ->with('success', 'Representative updated successfully.');
    }

    public function destroy(Representative $representative)
    {
        $representative->delete();

        return redirect()
            ->route('business.representatives.index')
            ->with('success', 'Representative deleted successfully.');
    }
}
