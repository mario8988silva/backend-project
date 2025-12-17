<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory;

    protected $fillable = [
        //
        'barcode',
        'name',
        'image',
        'description',
        // Foreign Keys
        'unit_type_id',
        'iva_category_id',
        'brand_id',
        'subcategory_id',
        'nutri_score_id',
        'eco_score_id',
        // Attributes
        'sugar_free',
        'gluten_free',
        'lactose_free',
        'vegan',
        'vegetarian',
        'organic',
    ];

    // Relationships
    public function unit_type()
    {
        return $this->belongsTo(UnitType::class);
    }

    public function iva_category()
    {
        return $this->belongsTo(IvaCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function nutri_score()
    {
        return $this->belongsTo(NutriScore::class);
    }

    public function eco_score()
    {
        return $this->belongsTo(EcoScore::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_has_products')
            ->withPivot('quantity', 'expiry_date')
            ->withTimestamps();
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
