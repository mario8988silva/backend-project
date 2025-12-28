<?php

namespace App\Http\Controllers;

use App\Models\EcoScore;
use Illuminate\Http\Request;

class EcoScoreController extends Controller
{
    public function index()
    {
        $ecoScores = EcoScore::orderBy('name')->paginate(25);

        return view('reference.eco-scores.index', [
            'eco_scores' => $ecoScores,
        ]);
    }

    public function show(EcoScore $ecoScore)
    {
        return view('reference.eco-scores.show', [
            'eco_score' => $ecoScore,
        ]);
    }

    public function create()
    {
        return view('reference.eco-scores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:eco_scores,name',
            'label'  => 'nullable|string|max:10',
            'color'  => 'nullable|string|max:20',
        ]);

        $ecoScore = EcoScore::create($validated);

        return redirect()
            ->route('eco-scores.show', $ecoScore->id)
            ->with('success', 'EcoScore created successfully.');
    }

    public function edit(EcoScore $ecoScore)
    {
        return view('reference.eco-scores.edit', [
            'eco_score' => $ecoScore,
        ]);
    }

    public function update(Request $request, EcoScore $ecoScore)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:eco_scores,name,' . $ecoScore->id,
            'label'  => 'nullable|string|max:10',
            'color'  => 'nullable|string|max:20',
        ]);

        $ecoScore->update($validated);

        return redirect()
            ->route('eco-scores.show', $ecoScore->id)
            ->with('success', 'EcoScore updated successfully.');
    }

    public function destroy(EcoScore $ecoScore)
    {
        $ecoScore->delete();

        return redirect()
            ->route('eco-scores.index')
            ->with('success', 'EcoScore deleted successfully.');
    }
}
