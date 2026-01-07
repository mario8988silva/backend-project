<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Traits\HasIndexHeaders;

class UnitType extends Model
{
    /** @use HasFactory<\Database\Factories\UnitTypeFactory> */
    use HasFactory, HasIndexHeaders;

    protected $fillable = [
        'name',
        'symbol',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function searchable(): array
    {
        return [
            'name',
            'symbol',
            'description',
        ];
    }

    public static function sortable(): array
    {
        return [
            'name',
            'symbol',
            'description',
            'created_at',
            'updated_at'
        ];
    }

    public static function localFilters(): array
    {
        return [
            'name',
            'symbol',
            'description',
        ];
    }
}
