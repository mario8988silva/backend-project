<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class SessionsMigrationTest extends BaseMigrationTest
{
    public function test_sessions_table_structure()
    {
        $this->assertTableExists('sessions');

        $this->assertTableColumns('sessions', [
            'id',
            'user_id',
            'ip_address',
            'user_agent',
            'payload',
            'last_activity',
        ]);
    }
}
