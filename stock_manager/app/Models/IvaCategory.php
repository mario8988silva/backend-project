<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Traits\HasIndexHeaders;

class IvaCategory extends Model
{
    /** @use HasFactory<\Database\Factories\IvaCategoryFactory> */
    use HasFactory, HasIndexHeaders;

    protected $fillable = [
        'name',
        'rate',
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
            'rate',
            'description',
        ];
    }

    public static function sortable(): array
    {
        return [
            'name',
            'rate',
            'description',
            'created_at',
            'updated_at'
        ];
    }

    public static function localFilters(): array
    {
        return [
            'name',
            'rate',
            'description',
        ];
    }
}
