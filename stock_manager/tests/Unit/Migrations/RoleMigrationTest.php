<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class RoleMigrationTest extends BaseMigrationTest
{
    public function test_roles_table_structure()
    {
        $this->assertTableExists('roles');

        $this->assertTableColumns('roles', [
            'id',
            'value',
            'created_at',
            'updated_at',
        ]);
    }
}
