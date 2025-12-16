<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SortService
{
    public function apply(Request $request, Builder $query, array $sortable, array $relationSorts, string $baseTable): Builder
    {
        if ($request->filled('sort') && $request->filled('direction')) {
            $sort = $request->get('sort');
            $direction = $request->get('direction');

            if (in_array($sort, $sortable)) {
                $query->orderBy($sort, $direction);
            } elseif (array_key_exists($sort, $relationSorts)) {
                $joins = $relationSorts[$sort];
                $column = array_pop($joins);
                foreach ($joins as $join) {
                    $query->join($join['table'], $join['local'], '=', $join['foreign']);
                }
                $query->orderBy($column, $direction)->select("{$baseTable}.*");
            }
        }

        return $query;
    }
}
