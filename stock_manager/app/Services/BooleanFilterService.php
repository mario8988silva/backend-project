<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BooleanFilterService
{
    /**
     * Apply boolean filters to a query.
     *
     * @param Request $request
     * @param Builder $query
     * @param array $fields  // list of boolean fields
     * @return Builder
     */
    public function apply(Request $request, Builder $query, array $fields): Builder
    {
        foreach ($fields as $field) {
            if ($request->filled($field)) {
                $query->where($field, (bool) $request->get($field));
            }
        }

        return $query;
    }
}
