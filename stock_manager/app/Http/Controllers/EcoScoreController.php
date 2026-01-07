<?php

namespace App\Http\Controllers;

use App\Models\EcoScore;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class EcoScoreController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {
        // 1. Generate headers
        $headers = EcoScore::indexHeaders();

        // 2. Build query
        $query = EcoScore::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $ecoScores = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.eco-scores.index', array_merge(
            [
                'eco_scores' => $ecoScores,
                'headers'  => $headers,
            ],
        ));
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
