<?php

namespace Tests\Unit\Factories;

use App\Models\RoleHasPermission;

class RoleHasPermissionFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(RoleHasPermission::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(RoleHasPermission::class);
    }
}
