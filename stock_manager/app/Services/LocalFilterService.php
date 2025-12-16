<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class LocalFilterService
{
    public function apply(Request $request, Builder $query, array $fields): Builder
    {
        foreach ($fields as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->get($field));
            }
        }

        return $query;
    }
}
