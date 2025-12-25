<?php

namespace Tests\Unit\Factories;

use App\Models\Stock;

class StockFactoryTest extends BaseFactoryTest
{
    public function test_stock_factory_creates()
    {
        $this->assertFactoryCreates(Stock::class);
    }

    public function test_stock_factory_makes()
    {
        $this->assertFactoryMakes(Stock::class);
    }

    public function test_stock_factory_generates_valid_attributes()
    {
        $instance = Stock::factory()->make();

        $this->assertGreaterThanOrEqual(0, $instance->quantity);
    }
}
