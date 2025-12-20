<?php

namespace Tests\Unit\Factories;

use App\Models\UnitType;

class UnitTypeFactoryTest extends BaseFactoryTest
{
    public function unit_type_factory_factory_creates_record()
    {
        $this->assertFactoryCreates(UnitType::class);
    }

    public function unit_type_factory_factory_makes_record()
    {
        $this->assertFactoryMakes(UnitType::class);
    }
}
