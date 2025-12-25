<?php

namespace Tests\Unit\Factories;

use App\Models\StockMovement;

class StockMovementFactoryTest extends BaseFactoryTest
{
    public function test_stock_movement_factory_creates()
    {
        $this->assertFactoryCreates(StockMovement::class);
    }

    public function test_stock_movement_factory_makes()
    {
        $this->assertFactoryMakes(StockMovement::class);
    }

    public function test_stock_movement_factory_generates_valid_attributes()
    {
        $instance = StockMovement::factory()->make();

        $this->assertGreaterThan(0, $instance->quantity);
        $this->assertContains($instance->movement_type, ['in', 'out']);
    }
}
