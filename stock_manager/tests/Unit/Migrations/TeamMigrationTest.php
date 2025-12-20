<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class TeamMigrationTest extends BaseMigrationTest
{
    public function test_teams_table_structure()
    {
        $this->assertTableExists('teams');

        $this->assertTableColumns('teams', [
            'id',
            'name',
            'email',
            'phone',
            'password_hash',
            'created_at',
            'updated_at',
        ]);
    }
}
