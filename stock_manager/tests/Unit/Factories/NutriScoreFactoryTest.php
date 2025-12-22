<?php

namespace Tests\Unit\Factories;

use App\Models\NutriScore;

class NutriScoreFactoryTest extends BaseFactoryTest
{
    public function test_nutri_score_factory_creates()
    {
        $this->assertFactoryCreates(NutriScore::class);
    }

    public function test_nutri_score_factory_makes()
    {
        $this->assertFactoryMakes(NutriScore::class);
    }

    public function test_nutri_score_factory_generates_valid_attributes()
    {
        $instance = NutriScore::factory()->make();

        $this->assertNotEmpty($instance->grade);
        $this->assertNotEmpty($instance->color);
        $this->assertNotEmpty($instance->description);
    }
}
