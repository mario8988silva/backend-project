<?php

namespace Tests\Unit\Factories;

use App\Models\Role;

class RoleFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Role::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Role::class);
    }
}
