<?php

namespace Tests\Unit\Factories;

use App\Models\NutriScore;

class NutriScoreFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(NutriScore::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(NutriScore::class);
    }
}
