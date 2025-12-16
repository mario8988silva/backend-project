<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ForeignFilterService
{
    public function apply(Request $request, Builder $query, array $rules): Builder
    {
        foreach ($rules as $field => $callback) {
            if ($request->filled($field)) {
                $value = $request->get($field);
                $callback($query, $value);
            }
        }

        return $query;
    }
}
