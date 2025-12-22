<?php

namespace Tests\Unit\Factories;

use App\Models\Family;

class FamilyFactoryTest extends BaseFactoryTest
{
    public function test_family_factory_creates()
    {
        $this->assertFactoryCreates(Family::class);
    }

    public function test_family_factory_makes()
    {
        $this->assertFactoryMakes(Family::class);
    }

    public function test_family_factory_generates_valid_attributes()
    {
        $instance = Family::factory()->make();

        $this->assertNotEmpty($instance->name);
        $this->assertNotEmpty($instance->description);
    }
}
