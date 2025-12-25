<?php

namespace Tests\Unit\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Representative;
use App\Models\Status;
use App\Models\User;
use App\Models\Invoice;

class OrderFactoryTest extends BaseFactoryTest
{
    public function test_order_factory_creates()
    {
        Product::factory()->create();
        Representative::factory()->create();
        User::factory()->create();
        Status::factory()->create();

        $this->assertFactoryCreates(Order::class);
    }


    public function test_order_factory_makes()
    {
        Product::factory()->create();
        Representative::factory()->create();
        User::factory()->create();
        Status::factory()->create();

        $this->assertFactoryMakes(Order::class);
    }

    public function test_order_factory_attaches_products()
    {
        Product::factory()->count(3)->create();
        Representative::factory()->create();
        User::factory()->create();
        Status::factory()->create();

        $order = Order::factory()->create();

        $this->assertGreaterThan(0, $order->products()->count());
    }
}
