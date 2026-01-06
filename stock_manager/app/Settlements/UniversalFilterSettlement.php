<?php

namespace App\Settlements;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\LocalFilterService;
use App\Services\ForeignFilterService;

class UniversalFilterSettlement
{
    public function __construct(
        private LocalFilterService $localFilter,
        private ForeignFilterService $foreignFilter
    ) {}

    public function apply(Request $request, Builder $query): Builder
    {
        $model = $query->getModel();

        // Local filters (simple where)
        if (method_exists($model, 'localFilters')) {
            $this->localFilter->apply(
                $request,
                $query,
                $model::localFilters()
            );
        }

        // Foreign filters (whereHas)
        if (method_exists($model, 'foreignFilters')) {
            $this->foreignFilter->apply(
                $request,
                $query,
                $model::foreignFilters()
            );
        }

        return $query;
    }
}

/*
class UniversalFilterSettlement
{
    public function __construct(
        private LocalFilterService $localFilter,
        private ForeignFilterService $foreignFilter
    ) {}

    protected array $localFields = [
        'brand_id',
        'subcategory_id',
        'unit_type_id',
        'iva_category_id',
        'nutri_score_id',
        'eco_score_id',
    ];

    protected function foreignRules(): array
    {
        return [
            'category_id' => function ($q, $v) {
                $q->whereHas('subcategory.category', fn($q2) => $q2->where('id', $v));
            },
            'family_id' => function ($q, $v) {
                $q->whereHas('subcategory.category.family', fn($q2) => $q2->where('id', $v));
            },
        ];
    }

    public function apply(Request $request, Builder $query): Builder
    {
        $this->localFilter->apply($request, $query, $this->localFields);
        $this->foreignFilter->apply($request, $query, $this->foreignRules());

        return $query;
    }
}
*/