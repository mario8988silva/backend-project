<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Traits\HasIndexHeaders;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory, HasIndexHeaders; 

    protected $fillable = [
        'name',
        'country',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }    
    
    protected static $indexHidden = ['id'];

    public static function searchable(): array
    {
        return [
            'name',
            'country',
            'description',
        ];
    }

    public static function sortable(): array
    {
        return [
            'name',
            'country',
            'description',
            'created_at',
            'updated_at'
        ];
    }

    public static function localFilters(): array
    {
        return [
            'name',
            'country',
        ];
    }
}
