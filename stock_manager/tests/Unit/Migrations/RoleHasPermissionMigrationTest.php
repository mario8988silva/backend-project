<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class RoleHasPermissionMigrationTest extends BaseMigrationTest
{
    public function test_role_has_permissions_table_structure()
    {
        $this->assertTableExists('role_has_permissions');

        $this->assertTableColumns('role_has_permissions', [
            'role_id',
            'permission_id',
            'created_at',
            'updated_at',
        ]);
    }
}
