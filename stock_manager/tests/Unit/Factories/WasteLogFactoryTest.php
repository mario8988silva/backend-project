<?php

namespace Tests\Unit\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\WasteLog;

class WasteLogFactoryTest extends BaseFactoryTest
{
    public function test_waste_log_factory_creates()
    {
        Product::factory()->create();
        Status::factory()->create();
        Order::factory()->create();

        $this->assertFactoryCreates(WasteLog::class);
    }

    public function test_waste_log_factory_makes()
    {
        Product::factory()->create();
        Status::factory()->create();
        Order::factory()->create();

        $this->assertFactoryMakes(WasteLog::class);
    }

    public function test_waste_log_factory_generates_valid_attributes()
    {
        Product::factory()->create();
        Status::factory()->create();
        Order::factory()->create();

        $instance = WasteLog::factory()->make();

        $this->assertNotNull($instance->product_id);
        $this->assertGreaterThan(0, $instance->quantity);
        $this->assertNotNull($instance->status_id);
    }
}
