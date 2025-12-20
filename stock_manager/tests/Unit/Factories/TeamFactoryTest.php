<?php

namespace Tests\Unit\Factories;

use Database\Factories\TeamFactory;

class TeamFactoryTest extends BaseFactoryTest
{
    public function team_factory_factory_creates_record()
    {
        $this->assertFactoryCreates(TeamFactory::class);
    }

    public function team_factory_factory_makes_record()
    {
        $this->assertFactoryMakes(TeamFactory::class);
    }
}
