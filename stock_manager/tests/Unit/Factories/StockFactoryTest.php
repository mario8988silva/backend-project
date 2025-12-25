<?php

namespace Tests\Unit\Factories;

use App\Models\OrderHasProduct;
use App\Models\Product;
use App\Models\Status;
use App\Models\Stock;

class StockFactoryTest extends BaseFactoryTest
{
    public function test_stock_factory_creates()
    {
        Product::factory()->create();
        Status::factory()->create();
        OrderHasProduct::factory()->create();

        $this->assertFactoryCreates(Stock::class);
    }

    public function test_stock_factory_makes()
    {
        Product::factory()->create();
        Status::factory()->create();
        OrderHasProduct::factory()->create();

        $this->assertFactoryMakes(Stock::class);
    }

    public function test_stock_factory_generates_valid_attributes()
    {
        Product::factory()->create();
        Status::factory()->create();
        OrderHasProduct::factory()->create();

        $instance = Stock::factory()->make();

        $this->assertNotNull($instance->product_id);
        $this->assertNotNull($instance->status_id);
        $this->assertGreaterThanOrEqual(0, $instance->quantity);
    }
}
