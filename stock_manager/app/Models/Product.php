<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory;

    protected $fillable = [
        'barcode',
        'name',
        'image',
        'description',
        'unit_type_id',
        'iva_category_id',
        'brand_id',
        'subcategory_id',
        'nutri_score_id',
        'eco_score_id',
        'expiry_date',
        'sugar_free',
        'gluten_free',
        'lactose_free',
        'vegan',
        'vegetarian',
        'organic',
    ];

    // Relationships
    public function unitType()     { return $this->belongsTo(UnitType::class); }
    public function ivaCategory()  { return $this->belongsTo(IvaCategory::class); }
    public function brand()        { return $this->belongsTo(Brand::class); }
    public function subcategory()  { return $this->belongsTo(Subcategory::class); }
    public function nutriScore()   { return $this->belongsTo(NutriScore::class); }
    public function ecoScore()     { return $this->belongsTo(EcoScore::class); }
}
