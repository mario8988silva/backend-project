<?php

namespace Tests\Unit\Factories;

use App\Models\Location;

class LocationFactoryTest extends BaseFactoryTest
{
    public function test_location_factory_creates()
    {
        $this->assertFactoryCreates(Location::class);
    }

    public function test_location_factory_makes()
    {
        $this->assertFactoryMakes(Location::class);
    }

    public function test_location_factory_generates_valid_attributes()
    {
        $instance = Location::factory()->make();

        $this->assertNotEmpty($instance->name);
        $this->assertNotEmpty($instance->address);
        $this->assertNotEmpty($instance->type);
    }
}
