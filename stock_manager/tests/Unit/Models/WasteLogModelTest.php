<?php

namespace Tests\Unit\Models;

use App\Models\WasteLog;
use App\Models\Product;
use App\Models\Status;
use App\Models\Order;

class WasteLogModelTest extends BaseModelTest
{
    public function test_waste_log_model_structure()
    {
        $model = new WasteLog();

        $this->assertModelTable($model, 'waste_logs');

        $this->assertModelFillable($model, [
            'product_id',
            'quantity',
            'logged_at',
            'status_id',
            'order_id',
            'notes',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_waste_log_relationships()
    {
        $model = new WasteLog();

        $this->assertInstanceOf(Product::class, $model->product()->getRelated());
        $this->assertInstanceOf(Status::class, $model->status()->getRelated());
        $this->assertInstanceOf(Order::class, $model->order()->getRelated());
    }
}
