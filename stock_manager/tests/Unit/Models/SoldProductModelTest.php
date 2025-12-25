<?php

namespace Tests\Unit\Models;

use App\Models\SoldProduct;
use App\Models\Product;
use App\Models\Order;

class SoldProductModelTest extends BaseModelTest
{
    public function test_sold_product_model_structure()
    {
        $model = new SoldProduct();

        $this->assertModelTable($model, 'sold_products');

        $this->assertModelFillable($model, [
            'product_id',
            'order_id',
            'quantity',
            'price',
            'total',
            'sold_at',
            'location',
            'notes',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_sold_product_relationships()
    {
        $model = new SoldProduct();

        $this->assertInstanceOf(Product::class, $model->product()->getRelated());
        $this->assertInstanceOf(Order::class, $model->order()->getRelated());
    }
}
