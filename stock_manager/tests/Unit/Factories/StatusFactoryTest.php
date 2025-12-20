<?php

namespace Tests\Unit\Factories;

use App\Models\Status;

class StatusFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Status::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Status::class);
    }
}
