<?php

namespace App\Settlements;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Services\SortService;

class ProductSortSettlement
{
    public function __construct(private SortService $sorter) {}

    protected array $sortable = [
        'created_at',
        'updated_at',
        'barcode',
        'name',
        'image',
        'description',
        'unit_type_id',
        'iva_category_id',
        'nutri_score_id',
        'eco_score_id',
        'sugar_free',
        'gluten_free',
        'lactose_free',
        'vegan',
        'vegetarian',
        'organic',
    ];

    protected array $relationSorts = [
        'brand' => [
            ['table' => 'brands', 'local' => 'products.brand_id', 'foreign' => 'brands.id'],
            'brands.name',
        ],
        'subcategory' => [
            ['table' => 'subcategories', 'local' => 'products.subcategory_id', 'foreign' => 'subcategories.id'],
            'subcategories.name',
        ],
        'category' => [
            ['table' => 'subcategories', 'local' => 'products.subcategory_id', 'foreign' => 'subcategories.id'],
            ['table' => 'categories', 'local' => 'subcategories.category_id', 'foreign' => 'categories.id'],
            'categories.name',
        ],
        'family' => [
            ['table' => 'subcategories', 'local' => 'products.subcategory_id', 'foreign' => 'subcategories.id'],
            ['table' => 'categories', 'local' => 'subcategories.category_id', 'foreign' => 'categories.id'],
            ['table' => 'families', 'local' => 'categories.family_id', 'foreign' => 'families.id'],
            'families.name',
        ],
    ];

    public function apply(Request $request, Builder $query): Builder
    {
        return $this->sorter->apply($request, $query, $this->sortable, $this->relationSorts, 'products');
    }
}
