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

    /*
    public function show(EcoScore $ecoScore)
    {
        return view('reference.eco-scores.show', [
            'eco_score' => $ecoScore,
        ]);
    }
    */
}
