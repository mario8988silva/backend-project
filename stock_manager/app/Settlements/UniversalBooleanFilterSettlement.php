<?php

namespace App\Settlements;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\BooleanFilterService;

class UniversalBooleanFilterSettlement
{
    public function __construct(private BooleanFilterService $filterService) {}

    public function apply(Request $request, Builder $query): Builder
    {
        $model = $query->getModel();

        // If the model defines boolean filters, apply them
        if (method_exists($model, 'booleanFilters')) {
            return $this->filterService->apply(
                $request,
                $query,
                $model::booleanFilters()
            );
        }

        return $query;
    }
}

/*
class UniversalBooleanFilterSettlement
{
    public function __construct(private BooleanFilterService $filterService) {}

    protected array $fields = [
        'sugar_free',
        'gluten_free',
        'vegan',
        'vegetarian',
        'organic',
    ];

    public function apply(Request $request, Builder $query): Builder
    {
        return $this->filterService->apply($request, $query, $this->fields);
    }
}
*/