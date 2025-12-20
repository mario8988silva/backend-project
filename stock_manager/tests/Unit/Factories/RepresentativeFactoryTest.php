<?php

namespace Tests\Unit\Factories;

use App\Models\Representative;

class RepresentativeFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Representative::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Representative::class);
    }
}
