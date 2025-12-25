<?php

namespace Tests\Unit\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\SoldProduct;

class SoldProductFactoryTest extends BaseFactoryTest
{
    public function test_sold_product_factory_creates()
    {
        Product::factory()->create();
        Order::factory()->create();

        $this->assertFactoryCreates(SoldProduct::class);
    }

    public function test_sold_product_factory_makes()
    {
        Product::factory()->create();
        Order::factory()->create();

        $this->assertFactoryMakes(SoldProduct::class);
    }

    public function test_sold_product_factory_generates_valid_attributes()
    {
        Product::factory()->create();
        Order::factory()->create();

        $instance = SoldProduct::factory()->make();

        $this->assertNotNull($instance->product_id);
        $this->assertGreaterThan(0, $instance->quantity);
        $this->assertNotNull($instance->total);
    }
}
