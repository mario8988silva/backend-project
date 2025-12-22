<?php

namespace Tests\Unit\Factories;

use App\Models\IvaCategory;

class IvaCategoryFactoryTest extends BaseFactoryTest
{
    public function test_iva_category_factory_creates()
    {
        $this->assertFactoryCreates(IvaCategory::class);
    }

    public function test_iva_category_factory_makes()
    {
        $this->assertFactoryMakes(IvaCategory::class);
    }

    public function test_iva_category_factory_generates_valid_attributes()
    {
        $instance = IvaCategory::factory()->make();

        $this->assertNotEmpty($instance->name);
        $this->assertNotNull($instance->rate);
        $this->assertNotEmpty($instance->description);
    }
}
