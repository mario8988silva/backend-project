<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Traits\HasIndexHeaders;

class Family extends Model
{
    /** @use HasFactory<\Database\Factories\FamilyFactory> */
    use HasFactory, HasIndexHeaders;

    protected $fillable = [
        'name',
        'description',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public static function searchable(): array
    {
        return [
            'name',
            'description',
        ];
    }

    public static function sortable(): array
    {
        return [
            'name',
            'description',
            'created_at',
            'updated_at'
        ];
    }

    public static function localFilters(): array
    {
        return [
            'name',
            'description',
        ];
    }
}
