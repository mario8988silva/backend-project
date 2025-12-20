<?php

namespace Tests\Unit\Factories;

use App\Models\OrderHasProduct;

class OrderHasProductFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(OrderHasProduct::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(OrderHasProduct::class);
    }
}
