<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Traits\HasIndexHeaders;

class EcoScore extends Model
{
    /** @use HasFactory<\Database\Factories\EcoScoreFactory> */
    use HasFactory, HasIndexHeaders; 

    protected $fillable = [
        'name',
        'color',
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
            'color',
            'description',
        ];
    }

    public static function sortable(): array
    {
        return [
            'name',
            'color',
            'description',
            'created_at',
            'updated_at'
        ];
    }

    public static function localFilters(): array
    {
        return [
            'name',
            'color',
            'description',
        ];
    }
}
