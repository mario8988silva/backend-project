<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Family;
use App\Models\Subcategory;
use App\Models\Supplier;
use App\Models\Product;


class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    
    protected $fillable = [
        'family_id',
        'name',
        'description',
    ];

    // Relationships
    public function family()            {return $this->belongsTo(Family::class);}
    public function subcategories()     {return $this->hasMany(Subcategory::class);}
    public function suppliers()         {return $this->belongsToMany(Supplier::class, 'category_supplier');}
    public function products()          {return $this->hasMany(Product::class);}
}
