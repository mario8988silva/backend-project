<?php

namespace Tests\Unit\Factories;

use App\Models\Product;

class ProductFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Product::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Product::class);
    }
}
