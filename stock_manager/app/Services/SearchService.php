<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    /**
     * Apply search rules to a query.
     *
     * @param Request $request
     * @param Builder $query
     * @param array $rules  // map of "type" => callback
     * @return Builder
     */
    public function apply(Request $request, Builder $query, array $rules): Builder
    {
        if (!$request->filled('search')) {
            return $query;
        }

        $search = $request->get('search');

        foreach ($rules as $callback) {
            $callback($query, $search);
        }

        return $query;
    }
}
