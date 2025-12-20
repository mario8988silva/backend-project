<?php

namespace Tests\Unit\Factories;

use App\Models\SoldProduct;

class SoldProductFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(SoldProduct::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(SoldProduct::class);
    }
}
