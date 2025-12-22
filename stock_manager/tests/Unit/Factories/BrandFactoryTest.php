<?php

namespace Tests\Unit\Factories;

use App\Models\Brand;

class BrandFactoryTest extends BaseFactoryTest
{
    public function test_brand_factory_creates()
    {
        $this->assertFactoryCreates(Brand::class);
    }

    public function test_brand_factory_makes()
    {
        $this->assertFactoryMakes(Brand::class);
    }

    public function test_brand_factory_generates_valid_attributes()
    {
        $instance = Brand::factory()->make();

        $this->assertNotEmpty($instance->name);
        $this->assertNotEmpty($instance->country);
        $this->assertNotEmpty($instance->description);
    }
}
