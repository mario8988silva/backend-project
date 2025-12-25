<?php

namespace Tests\Unit\Models;

use App\Models\OrderHasProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;

class OrderHasProductModelTest extends BaseModelTest
{
    public function test_order_has_product_model_structure()
    {
        $model = new OrderHasProduct();

        $this->assertModelTable($model, 'order_has_products');

        $this->assertModelFillable($model, [
            'order_id',
            'product_id',
            'quantity',
            'expiry_date',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_order_has_product_relationships()
    {
        $model = new OrderHasProduct();

        $this->assertInstanceOf(Order::class, $model->order()->getRelated());
        $this->assertInstanceOf(Product::class, $model->product()->getRelated());
        $this->assertInstanceOf(Stock::class, $model->stock()->getRelated());
    }
}
