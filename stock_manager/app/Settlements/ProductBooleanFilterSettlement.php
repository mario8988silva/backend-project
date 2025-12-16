<?php

namespace App\Settlements;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\BooleanFilterService;

class ProductBooleanFilterSettlement
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
