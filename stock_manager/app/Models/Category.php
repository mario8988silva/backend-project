<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function retailers()         {return $this->belongsToMany(Retailer::class, 'category_retailer');}
    //public function products()          {return $this->hasMany(Product::class);}
}
