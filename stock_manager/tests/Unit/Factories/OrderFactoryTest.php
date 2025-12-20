<?php

namespace Tests\Unit\Factories;

use App\Models\Order;

class OrderFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Order::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Order::class);
    }
}
