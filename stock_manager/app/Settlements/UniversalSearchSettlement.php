<?php

namespace App\Settlements;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\SearchService;

class UniversalSearchSettlement
{
    public function __construct(private SearchService $searcher) {}

    public function apply(Request $request, Builder $query): Builder
    {
        $model = $query->getModel();

        if (!method_exists($model, 'searchable')) {
            return $query;
        }

        $fields = $model::searchable();
        $rules = [];

        foreach ($fields as $field) {
            if (str_contains($field, '.')) {
                $rules[] = fn($q, $s) => $this->applyNestedRelation($q, $field, $s);
            } else {
                $rules[] = fn($q, $s) => $q->orWhere($field, 'like', "%{$s}%");
            }
        }

        return $this->searcher->apply($request, $query, $rules);
    }

    private function applyNestedRelation(Builder $query, string $field, string $search)
    {
        $segments = explode('.', $field);

        $column = array_pop($segments);
        $relations = $segments;

        $query->orWhere(function ($q) use ($relations, $column, $search) {
            $this->buildNestedWhereHas($q, $relations, $column, $search);
        });
    }

    private function buildNestedWhereHas($query, array $relations, string $column, string $search)
    {
        $relation = array_shift($relations);

        $query->whereHas($relation, function ($q) use ($relations, $column, $search) {
            if (empty($relations)) {
                $q->where($column, 'like', "%{$search}%");
            } else {
                $this->buildNestedWhereHas($q, $relations, $column, $search);
            }
        });
    }
}



/*
class UniversalSearchSettlement
{
    public function __construct(private SearchService $searcher) {}

    public function apply(Request $request, Builder $query): Builder
    {
        $rules = [
            // Product columns
            fn($q, $s) => $q->where(function ($q2) use ($s) {
                $q2->orWhere('name', 'like', "%{$s}%")
                   ->orWhere('barcode', 'like', "%{$s}%")
                   ->orWhere('description', 'like', "%{$s}%");
            }),

            // Brand
            fn($q, $s) => $q->orWhereHas('brand', fn($q2) => $q2->where('name','like',"%{$s}%")),

            // Subcategory
            fn($q, $s) => $q->orWhereHas('subcategory', fn($q2) => $q2->where('name','like',"%{$s}%")),

            // Category
            fn($q, $s) => $q->orWhereHas('subcategory.category', fn($q2) => $q2->where('name','like',"%{$s}%")),

            // Family
            fn($q, $s) => $q->orWhereHas('subcategory.category.family', fn($q2) => $q2->where('name','like',"%{$s}%")),

            // Unit type
            fn($q, $s) => $q->orWhereHas('unit_type', fn($q2) => $q2->where('name','like',"%{$s}%")),

            // IVA category
            fn($q, $s) => $q->orWhereHas('iva_category', fn($q2) => $q2->where('name','like',"%{$s}%")),

            // NutriScore
            fn($q, $s) => $q->orWhereHas('nutri_score', fn($q2) => $q2->where('name','like',"%{$s}%")),

            // EcoScore
            fn($q, $s) => $q->orWhereHas('eco_score', fn($q2) => $q2->where('name','like',"%{$s}%")),
        ];

        return $this->searcher->apply($request, $query, $rules);
    }
}
*/
