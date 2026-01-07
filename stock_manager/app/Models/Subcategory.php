<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Product;
use App\Traits\HasIndexHeaders;

class Subcategory extends Model
{
    /** @use HasFactory<\Database\Factories\SubcategoryFactory> */
    use HasFactory, HasIndexHeaders;

    protected $fillable = [
        'category_id',
        'name',
        'description',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // -----------------------------------------
    public static function searchable(): array
    {
        return [
            'name',
            'category.name',
            'category.family.name',
        ];
    }

    public static function sortable(): array
    {
        return [
            'name',
            'category.name',
            'category.family.name',
        ];
    }

    public static function relationSorts(): array
    {
        return [
            'category' => [
                ['table' => 'categories', 'local' => 'subcategories.category_id', 'foreign' => 'categories.id'],
                'categories.name',
            ],
            'family' => [
                ['table' => 'categories', 'local' => 'subcategories.category_id', 'foreign' => 'categories.id'],
                ['table' => 'families', 'local' => 'categories.family_id', 'foreign' => 'families.id'],
                'families.name',
            ],
        ];
    }

    public static function localFilters(): array
    {
        return [
            'name',
        ];
    }
    public static function foreignFilters(): array
    {
        return [
            'category_id' => fn($q, $v) =>
            $q->whereHas('category', fn($q2) => $q2->where('id', $v)),

            'family_id' => fn($q, $v) =>
            $q->whereHas('category.family', fn($q2) => $q2->where('id', $v)),
        ];
    }
}
