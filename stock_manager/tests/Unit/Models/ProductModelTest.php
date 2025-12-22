<?php

namespace Tests\Unit\Models;

use App\Models\Brand;
use App\Models\EcoScore;
use App\Models\IvaCategory;
use App\Models\NutriScore;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Subcategory;
use App\Models\UnitType;

class ProductModelTest extends BaseModelTest
{
    public function test_product_model_structure()
    {
        $model = new Product();

        $this->assertModelTable($model, 'products');

        $this->assertModelFillable($model, [
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
            'sugar_free',
            'gluten_free',
            'lactose_free',
            'vegan',
            'vegetarian',
            'organic',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_product_relationships()
    {
        $model = new Product();

        $this->assertInstanceOf(UnitType::class, $model->unit_type()->getRelated());
        $this->assertInstanceOf(IvaCategory::class, $model->iva_category()->getRelated());
        $this->assertInstanceOf(Brand::class, $model->brand()->getRelated());
        $this->assertInstanceOf(Subcategory::class, $model->subcategory()->getRelated());
        $this->assertInstanceOf(NutriScore::class, $model->nutri_score()->getRelated());
        $this->assertInstanceOf(EcoScore::class, $model->eco_score()->getRelated());
        $this->assertInstanceOf(Order::class, $model->orders()->getRelated());
        $this->assertInstanceOf(Stock::class, $model->stocks()->getRelated());
    }
}
