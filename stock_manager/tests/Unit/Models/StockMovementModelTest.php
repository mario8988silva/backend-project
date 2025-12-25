<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockMovement;

class StockMovementModelTest extends BaseModelTest
{
    public function test_stock_movement_model_structure()
    {
        $model = new StockMovement();

        $this->assertModelTable($model, 'stock_movements');

        $this->assertModelFillable($model, [
            'product_id',
            'quantity',
            'movement_type',
            'order_id',
            'stock_id',
            'moved_at',
            'notes',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_stock_movement_relationships()
    {
        $model = new StockMovement();

        $this->assertInstanceOf(Product::class, $model->product()->getRelated());
        $this->assertInstanceOf(Order::class, $model->order()->getRelated());
        $this->assertInstanceOf(Stock::class, $model->stock()->getRelated());
    }
}
