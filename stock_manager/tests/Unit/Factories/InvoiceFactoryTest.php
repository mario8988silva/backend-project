<?php

namespace Tests\Unit\Factories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Supplier;

class InvoiceFactoryTest extends BaseFactoryTest
{
    public function test_invoice_factory_creates()
    {
        Order::factory()->create();
        Supplier::factory()->create();

        $this->assertFactoryCreates(Invoice::class);
    }

    public function test_invoice_factory_makes()
    {
        Order::factory()->create();
        Supplier::factory()->create();

        $this->assertFactoryMakes(Invoice::class);
    }

    public function test_invoice_factory_generates_valid_attributes()
    {
        Order::factory()->create();
        Supplier::factory()->create();

        $instance = Invoice::factory()->make();

        $this->assertNotEmpty($instance->number);
        $this->assertNotEmpty($instance->issue_date);
        $this->assertNotEmpty($instance->due_date);
        $this->assertNotEmpty($instance->currency);

        $this->assertTrue(
            $instance->order_id === null ||
                Order::where('id', $instance->order_id)->exists()
        );

        $this->assertTrue(
            $instance->supplier_id === null ||
                Supplier::where('id', $instance->supplier_id)->exists()
        );
    }
}
