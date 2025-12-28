<?php

namespace App\Http\Controllers;

use App\Models\NutriScore;
use Illuminate\Http\Request;

class NutriScoreController extends Controller
{
    public function index()
    {
        $nutriScores = NutriScore::orderBy('name')->paginate(25);

        return view('reference.nutri-scores.index', [
            'nutri_scores' => $nutriScores,
        ]);
    }

    public function show(NutriScore $nutriScore)
    {
        return view('reference.nutri-scores.show', [
            'nutri_score' => $nutriScore,
        ]);
    }

    public function create()
    {
        return view('reference.nutri-scores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:nutri_scores,name',
            'label'  => 'nullable|string|max:10',
            'color'  => 'nullable|string|max:20',
        ]);

        $nutriScore = NutriScore::create($validated);

        return redirect()
            ->route('nutri-scores.show', $nutriScore->id)
            ->with('success', 'NutriScore created successfully.');
    }

    public function edit(NutriScore $nutriScore)
    {
        return view('reference.nutri-scores.edit', [
            'nutri_score' => $nutriScore,
        ]);
    }

    public function update(Request $request, NutriScore $nutriScore)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:nutri_scores,name,' . $nutriScore->id,
            'label'  => 'nullable|string|max:10',
            'color'  => 'nullable|string|max:20',
        ]);

        $nutriScore->update($validated);

        return redirect()
            ->route('nutri-scores.show', $nutriScore->id)
            ->with('success', 'NutriScore updated successfully.');
    }

    public function destroy(NutriScore $nutriScore)
    {
        $nutriScore->delete();

        return redirect()
            ->route('nutri-scores.index')
            ->with('success', 'NutriScore deleted successfully.');
    }
}
