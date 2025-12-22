<?php

namespace Tests\Unit\Models;

use App\Models\Brand;
use App\Models\Product;

class BrandModelTest extends BaseModelTest
{
    public function test_brand_model_structure()
    {
        $model = new Brand();

        $this->assertModelTable($model, 'brands');

        $this->assertModelFillable($model, [
            'name',
            'country',
            'description',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_brand_products_relationship()
    {
        $model = new Brand();

        $this->assertInstanceOf(
            Product::class,
            $model->products()->getRelated(),
            'Brand->products() should return a Product model.'
        );
    }
}
