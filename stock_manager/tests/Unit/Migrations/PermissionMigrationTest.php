<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class PermissionMigrationTest extends BaseMigrationTest
{
    public function test_permissions_table_structure()
    {
        $this->assertTableExists('permissions');

        $this->assertTableColumns('permissions', [
            'id',
            'value',
            'created_at',
            'updated_at',
        ]);
    }
}
