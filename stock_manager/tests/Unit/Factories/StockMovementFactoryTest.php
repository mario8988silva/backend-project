<?php

namespace Tests\Unit\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\Stock;
use App\Models\StockMovement;

class StockMovementFactoryTest extends BaseFactoryTest
{
    public function test_stock_movement_factory_creates()
    {
        Product::factory()->create();
        Order::factory()->create();
        Stock::factory()->create();

        $this->assertFactoryCreates(StockMovement::class);
    }

    public function test_stock_movement_factory_makes()
    {
        Product::factory()->create();
        Order::factory()->create();
        Stock::factory()->create();

        $this->assertFactoryMakes(StockMovement::class);
    }

    public function test_stock_movement_factory_generates_valid_attributes()
    {
        Product::factory()->create();
        Order::factory()->create();
        Stock::factory()->create();

        $instance = StockMovement::factory()->make();

        $this->assertNotNull($instance->product_id);
        $this->assertGreaterThan(0, $instance->quantity);
        $this->assertContains($instance->movement_type, ['in', 'out']);
    }
}
