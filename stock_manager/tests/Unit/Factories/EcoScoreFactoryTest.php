<?php

namespace Tests\Unit\Factories;

use App\Models\EcoScore;

class EcoScoreFactoryTest extends BaseFactoryTest
{
    public function test_eco_score_factory_creates()
    {
        $this->assertFactoryCreates(EcoScore::class);
    }

    public function test_eco_score_factory_makes()
    {
        $this->assertFactoryMakes(EcoScore::class);
    }

    public function test_eco_score_factory_generates_valid_attributes()
    {
        $instance = EcoScore::factory()->make();

        $this->assertNotEmpty($instance->name);
        $this->assertNotEmpty($instance->color);
        $this->assertNotEmpty($instance->description);
    }
}
