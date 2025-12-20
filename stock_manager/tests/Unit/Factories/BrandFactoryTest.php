<?php

namespace Tests\Unit\Factories;

use App\Models\Brand;

class BrandFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Brand::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Brand::class);
    }
}
