<?php

namespace App\Settlements;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\SearchService;

class ProductSearchSettlement
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
            fn($q, $s) => $q->orWhereHas('nutri_score', fn($q2) => $q2->where('grade','like',"%{$s}%")),

            // EcoScore
            fn($q, $s) => $q->orWhereHas('eco_score', fn($q2) => $q2->where('grade','like',"%{$s}%")),
        ];

        return $this->searcher->apply($request, $query, $rules);
    }
}
