<?php

namespace Tests\Unit\Models;

use App\Models\IvaCategory;
use App\Models\Product;

class IvaCategoryModelTest extends BaseModelTest
{
    public function test_iva_category_model_structure()
    {
        $model = new IvaCategory();

        $this->assertModelTable($model, 'iva_categories');

        $this->assertModelFillable($model, [
            'name',
            'rate',
            'description',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_iva_category_products_relationship()
    {
        $model = new IvaCategory();

        $this->assertInstanceOf(
            Product::class,
            $model->products()->getRelated(),
            'IvaCategory->products() should return a Product model.'
        );
    }
}
