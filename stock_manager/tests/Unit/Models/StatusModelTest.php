<?php

namespace Tests\Unit\Models;

use App\Models\OrderHasProduct;
use App\Models\Product;
use App\Models\Status;
use App\Models\Stock;

class StatusModelTest extends BaseModelTest
{
    public function test_status_model_structure()
    {
        $model = new Status();

        $this->assertModelTable($model, 'statuses');

        $this->assertModelFillable($model, [
            'name',
            'description',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_status_relationships()
    {
        $model = new Status();

        $this->assertInstanceOf(Product::class, $model->products()->getRelated());
        $this->assertInstanceOf(OrderHasProduct::class, $model->orderedProducts()->getRelated());
        $this->assertInstanceOf(Stock::class, $model->stocks()->getRelated());
    }
}
