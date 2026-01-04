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

    /*
    public function show(NutriScore $nutriScore)
    {
        return view('reference.nutri-scores.show', [
            'nutri_score' => $nutriScore,
        ]);
    }
    */
}
