<?php

namespace Tests\Unit\Factories;

use App\Models\Family;

class FamilyFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Family::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Family::class);
    }
}
