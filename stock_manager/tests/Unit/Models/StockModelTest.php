<?php

namespace Tests\Unit\Models;

use App\Models\OrderHasProduct;
use App\Models\Product;
use App\Models\Status;
use App\Models\Stock;

class StockModelTest extends BaseModelTest
{
    public function test_stock_model_structure()
    {
        $model = new Stock();

        $this->assertModelTable($model, 'stocks');

        $this->assertModelFillable($model, [
            'product_id',
            'order_has_product_id',
            'status_id',
            'quantity',
            'location',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_stock_relationships()
    {
        $model = new Stock();

        $this->assertInstanceOf(Product::class, $model->product()->getRelated());
        $this->assertInstanceOf(OrderHasProduct::class, $model->orderHasProduct()->getRelated());
        $this->assertInstanceOf(Status::class, $model->status()->getRelated());
    }
}
