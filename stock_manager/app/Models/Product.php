<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\UnitType;
use App\Models\IvaCategory;
use App\Models\Brand;
use App\Models\Subcategory;
use App\Models\NutriScore;
use App\Models\EcoScore;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Support\Facades\Schema;

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

    //
    public static function indexHeaders()
    {
        $columns = Schema::getColumnListing((new self)->getTable());

        // Remove columns you don’t want in the index 
        $hidden = ['id', 'created_at', 'updated_at', 'description', 'image',];

        $columns = array_diff($columns, $hidden);

        // Convert snake_case to Human Readable 
        return array_map(function ($col) {
            return ucwords(str_replace('_', ' ', $col));
        }, $columns);
    }
}
