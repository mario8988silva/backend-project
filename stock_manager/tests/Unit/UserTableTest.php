<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\BaseDatabaseTest;

class UserTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_user_table_can_be_exported()
    {
        $this->assertTableHasData(User::class);
    }
}
