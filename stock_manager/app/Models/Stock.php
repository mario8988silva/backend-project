<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\OrderHasProduct;
use App\Models\Status;
use App\Traits\HasIndexHeaders;

class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory, HasIndexHeaders;

    protected $fillable = [
        'quantity',
        'product_id',
        'order_has_product_id',
        'status_id',
        'location_id',
        'expiry_date',
        'notes',
    ];


    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderHasProduct()
    {
        return $this->belongsTo(OrderHasProduct::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // -----------------------------------------
    public static function searchable(): array
    {
        return [
            'product_id',
            'order_has_product_id',
            'status_id',
            'quantity',
            'location.name',
            'product.name',
            'product.barcode',
            'product.description',
            'product.brand.name',
            'product.subcategory.name',
            'product.subcategory.category.name',
            'product.subcategory.category.family.name',
            'product.unit_type.name',
            'product.iva_category.name',
            'product.nutri_score.name',
            'product.eco_score.name',
        ];
    }

    // -----------------------------------------
    public static function sortable(): array
    {
        return [
            'created_at',
            'updated_at',
            'quantity',
            'product_id',
            'order_has_product_id',
            'status_id',
            'location_id',
        ];
    }

    public static function relationSorts(): array
    {
        return [
            'product' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                'products.name',
            ],
            'product.brand' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'brands', 'local' => 'products.brand_id', 'foreign' => 'brands.id'],
                'brands.name',
            ],
            'product.subcategory' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'subcategories', 'local' => 'products.subcategory_id', 'foreign' => 'subcategories.id'],
                'subcategories.name',
            ],
            'product.category' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'subcategories', 'local' => 'products.subcategory_id', 'foreign' => 'subcategories.id'],
                ['table' => 'categories', 'local' => 'subcategories.category_id', 'foreign' => 'categories.id'],
                'categories.name',
            ],
            'product.family' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'subcategories', 'local' => 'products.subcategory_id', 'foreign' => 'subcategories.id'],
                ['table' => 'categories', 'local' => 'subcategories.category_id', 'foreign' => 'categories.id'],
                ['table' => 'families', 'local' => 'categories.family_id', 'foreign' => 'families.id'],
                'families.name',
            ],
            'product.unit_type' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'unit_types', 'local' => 'products.unit_type_id', 'foreign' => 'unit_types.id'],
                'unit_types.name',
            ],
            'product.iva_category' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'iva_categories', 'local' => 'products.iva_category_id', 'foreign' => 'iva_categories.id'],
                'iva_categories.name',
            ],
            'product.nutri_score' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'nutri_scores', 'local' => 'products.nutri_score_id', 'foreign' => 'nutri_scores.id'],
                'nutri_scores.name',
            ],
            'product.eco_score' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                ['table' => 'eco_scores', 'local' => 'products.eco_score_id', 'foreign' => 'eco_scores.id'],
                'eco_scores.name',
            ],
            'product.sugar_free' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                'products.sugar_free',
            ],
            'product.gluten_free' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                'products.gluten_free',
            ],
            'product.lactose_free' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                'products.lactose_free',
            ],
            'product.vegan' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                'products.vegan',
            ],
            'product.vegetarian' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                'products.vegetarian',
            ],
            'product.organic' => [
                ['table' => 'products', 'local' => 'stocks.product_id', 'foreign' => 'products.id'],
                'products.organic',
            ],
        ];
    }

    // -----------------------------------------

    public static function localFilters(): array
    {
        return [
            'created_at',
            'updated_at',
            'quantity',
            'product_id',
            'order_has_product_id',
            'status_id',
            'location_id',
        ];
    }

    public static function foreignFilters(): array
    {
        return [
            'category_id' => fn($q, $v) =>
            $q->whereHas('product.subcategory.category', fn($q2) => $q2->where('id', $v)),

            'family_id' => fn($q, $v) =>
            $q->whereHas('product.subcategory.category.family', fn($q2) => $q2->where('id', $v)),

            // BOOLEAN FLAGS
            'sugar_free' => fn($q, $v) =>
            $q->whereHas('product', fn($q2) => $q2->where('sugar_free', $v)),

            'gluten_free' => fn($q, $v) =>
            $q->whereHas('product', fn($q2) => $q2->where('gluten_free', $v)),

            'vegan' => fn($q, $v) =>
            $q->whereHas('product', fn($q2) => $q2->where('vegan', $v)),

            'vegetarian' => fn($q, $v) =>
            $q->whereHas('product', fn($q2) => $q2->where('vegetarian', $v)),

            'organic' => fn($q, $v) =>
            $q->whereHas('product', fn($q2) => $q2->where('organic', $v)),
        ];
    }


    // -----------------------------------------

    public static function booleanFilters(): array
    {
        return [
            'products.sugar_free',
            'products.gluten_free',
            'products.vegan',
            'products.vegetarian',
            'products.organic',
        ];
    }
}
