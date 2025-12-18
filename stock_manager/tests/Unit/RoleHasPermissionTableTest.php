<?php

namespace Tests\Unit;

use App\Models\RoleHasPermission;
use Tests\BaseDatabaseTest;

class RoleHasPermissionTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_role_has_permission_table_can_be_exported()
    {
        $this->assertTableHasData(RoleHasPermission::class);
        $this->showTableDetails(RoleHasPermission::class);   // prints sample rows
        $this->assertFactoryCreates(RoleHasPermission::class); // confirms factory works
    }
}
