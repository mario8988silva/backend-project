<?php

namespace Tests\Unit\Factories;

use App\Models\Status;

class StatusFactoryTest extends BaseFactoryTest
{
    public function test_status_factory_creates()
    {
        $this->assertFactoryCreates(Status::class);
    }

    public function test_status_factory_makes()
    {
        $this->assertFactoryMakes(Status::class);
    }

    public function test_status_factory_generates_valid_attributes()
    {
        $instance = Status::factory()->make();

        $this->assertNotEmpty($instance->state);
        $this->assertNotEmpty($instance->description);
    }
}
