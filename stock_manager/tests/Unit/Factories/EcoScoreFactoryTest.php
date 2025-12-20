<?php

namespace Tests\Unit\Factories;

use App\Models\EcoScore;

class EcoScoreFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(EcoScore::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(EcoScore::class);
    }
}
