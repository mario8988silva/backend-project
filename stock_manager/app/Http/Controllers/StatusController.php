<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::orderBy('name')->paginate(25);

        return view('statuses.index', [
            'statuses' => $statuses,
        ]);
    }

    public function show(Status $status)
    {
        return view('statuses.show', [
            'status' => $status,
        ]);
    }

    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:statuses,name',
            'description' => 'nullable|string|max:500',
            'active'      => 'boolean',
        ]);

        $status = Status::create($validated);

        return redirect()
            ->route('statuses.show', $status->id)
            ->with('success', 'Status created successfully.');
    }

    public function edit(Status $status)
    {
        return view('statuses.edit', [
            'status' => $status,
        ]);
    }

    public function update(Request $request, Status $status)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:statuses,name,' . $status->id,
            'description' => 'nullable|string|max:500',
            'active'      => 'boolean',
        ]);

        $status->update($validated);

        return redirect()
            ->route('statuses.show', $status->id)
            ->with('success', 'Status updated successfully.');
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()
            ->route('statuses.index')
            ->with('success', 'Status deleted successfully.');
    }
}
