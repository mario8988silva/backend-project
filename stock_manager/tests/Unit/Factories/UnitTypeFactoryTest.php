<?php

namespace Tests\Unit\Factories;

use App\Models\UnitType;

class UnitTypeFactoryTest extends BaseFactoryTest
{
    public function test_unit_type_factory_creates()
    {
        $this->assertFactoryCreates(UnitType::class);
    }

    public function test_unit_type_factory_makes()
    {
        $this->assertFactoryMakes(UnitType::class);
    }

    public function test_unit_type_factory_generates_valid_attributes()
    {
        $instance = UnitType::factory()->make();

        $this->assertNotEmpty($instance->name);
        $this->assertNotEmpty($instance->symbol);
        $this->assertNotEmpty($instance->description);
    }
}
