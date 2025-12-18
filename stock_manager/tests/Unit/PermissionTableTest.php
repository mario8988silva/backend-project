<?php

namespace Tests\Unit;

use App\Models\Permission;
use Tests\BaseDatabaseTest;

class PermissionTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_permission_table_can_be_exported()
    {
        $this->assertTableHasData(Permission::class);
        $this->showTableDetails(Permission::class);   // prints sample rows
        $this->assertFactoryCreates(Permission::class); // confirms factory works
    }
}
