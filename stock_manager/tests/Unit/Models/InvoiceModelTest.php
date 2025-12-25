<?php

namespace Tests\Unit\Models;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Supplier;

class InvoiceModelTest extends BaseModelTest
{
    public function test_invoice_model_structure()
    {
        $model = new Invoice();

        $this->assertModelTable($model, 'invoices');

        $this->assertModelFillable($model, [
            'number',
            'issue_date',
            'due_date',
            'order_id',
            'supplier_id',
            'total_amount',
            'currency',
            'notes',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_invoice_relationships()
    {
        $model = new Invoice();

        $this->assertInstanceOf(Order::class, $model->order()->getRelated());
        $this->assertInstanceOf(Supplier::class, $model->supplier()->getRelated());
    }
}
