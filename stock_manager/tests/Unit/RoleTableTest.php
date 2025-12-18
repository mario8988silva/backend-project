<?php

namespace Tests\Unit;

use App\Models\Role;
use Tests\BaseDatabaseTest;

class RoleTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_role_table_can_be_exported()
    {
        $this->assertTableHasData(Role::class);
        $this->showTableDetails(Role::class);   // prints sample rows
        $this->assertFactoryCreates(Role::class); // confirms factory works
    }
}
