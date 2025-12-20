<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class StatusMigrationTest extends BaseMigrationTest
{
    public function test_statuses_table_structure()
    {
        $this->assertTableExists('statuses');

        $this->assertTableColumns('statuses', [
            'id',
            'name',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
