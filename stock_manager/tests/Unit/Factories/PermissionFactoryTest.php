<?php

namespace Tests\Unit\Factories;

use App\Models\Permission;

class PermissionFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Permission::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Permission::class);
    }
}
