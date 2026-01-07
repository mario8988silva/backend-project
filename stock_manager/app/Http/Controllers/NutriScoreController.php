<?php

namespace App\Http\Controllers;

use App\Models\NutriScore;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class NutriScoreController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {

        // 1. Generate headers
        $headers = NutriScore::indexHeaders();

        // 2. Build query
        $query = NutriScore::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $nutriScores = $query->paginate(25);

        // 8. Return view WITH headers
        return view('reference.nutri-scores.index', array_merge(
            [
                'nutri_scores' => $nutriScores,
                'headers'  => $headers,
            ],
        ));
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
