<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\Representative;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Status;

class OrderModelTest extends BaseModelTest
{
    public function test_order_model_structure()
    {
        $model = new Order();

        $this->assertModelTable($model, 'orders');

        $this->assertModelFillable($model, [
            'representative_id',
            'user_id',
            'order_date',
            'delivery_date',
            'invoice_id',
            'status_id',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_order_relationships()
    {
        $model = new Order();

        $this->assertInstanceOf(Product::class, $model->products()->getRelated());
        $this->assertInstanceOf(Representative::class, $model->representative()->getRelated());
        $this->assertInstanceOf(User::class, $model->user()->getRelated());
        $this->assertInstanceOf(Invoice::class, $model->invoice()->getRelated());
        $this->assertInstanceOf(Status::class, $model->status()->getRelated());
    }
}
