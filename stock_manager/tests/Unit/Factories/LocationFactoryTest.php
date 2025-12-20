<?php

namespace Tests\Unit\Factories;

use App\Models\Location;

class LocationFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Location::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Location::class);
    }
}
