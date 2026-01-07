<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Family;
use App\Models\Subcategory;
use App\Models\Supplier;
use App\Models\Product;
use App\Traits\HasIndexHeaders;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, HasIndexHeaders;

    protected $fillable = [
        'family_id',
        'name',
        'description',
    ];

    // Relationships
    public function family()
    {
        return $this->belongsTo(Family::class);
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'category_has_suppliers');
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class, 'category_id', 'subcategory_id', 'id', 'id');
    }

    // -----------------------------------------
    public static function searchable(): array
    {
        return [
            'name',
            'description',
            'family.name',
        ];
    }

    public static function sortable(): array
    {
        return [
            'name',
            'description',
            'family.name',
        ];
    }

    public static function relationSorts(): array
    {
        return [
            'family' => [
                ['table' => 'families', 'local' => 'categories.family_id', 'foreign' => 'families.id'],
                'families.name',
            ],
        ];
    }

    public static function localFilters(): array
    {
        return [
            'name',
            'description',
        ];
    }
    public static function foreignFilters(): array
    {
        return [
            'family_id' => fn($q, $v) =>
            $q->whereHas('family', fn($q2) => $q2->where('id', $v)),
        ];
    }
}
