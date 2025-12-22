<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use App\Models\UnitType;

class UnitTypeModelTest extends BaseModelTest
{
    public function test_unit_type_model_structure()
    {
        $model = new UnitType();

        $this->assertModelTable($model, 'unit_types');

        $this->assertModelFillable($model, [
            'name',
            'symbol',
            'description',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_unit_type_products_relationship()
    {
        $model = new UnitType();

        $this->assertInstanceOf(
            Product::class,
            $model->products()->getRelated(),
            'UnitType->products() should return a Product model.'
        );
    }
}
