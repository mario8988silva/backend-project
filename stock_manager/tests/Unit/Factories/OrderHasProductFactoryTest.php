<?php

namespace Tests\Unit\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderHasProduct;

class OrderHasProductFactoryTest extends BaseFactoryTest
{
    public function test_order_has_product_factory_creates()
    {
        // Required foreign keys
        Order::factory()->create();
        Product::factory()->create();

        $this->assertFactoryCreates(OrderHasProduct::class);
    }

    public function test_order_has_product_factory_makes()
    {
        Order::factory()->create();
        Product::factory()->create();

        $this->assertFactoryMakes(OrderHasProduct::class);
    }

    public function test_order_has_product_factory_generates_valid_attributes()
    {
        Order::factory()->create();
        Product::factory()->create();

        $instance = OrderHasProduct::factory()->make();

        $this->assertNotNull($instance->order_id);
        $this->assertNotNull($instance->product_id);
        $this->assertGreaterThan(0, $instance->quantity);
    }
}
