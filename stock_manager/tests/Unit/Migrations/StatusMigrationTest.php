<?php

namespace Tests\Unit\Migrations;

class StatusMigrationTest extends BaseMigrationTest
{
    public function test_statuses_table_structure()
    {
        $this->assertTableExists('statuses');

        $this->assertTableColumns('statuses', [
            'id',
            'state',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
