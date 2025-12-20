<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class UserMigrationTest extends BaseMigrationTest
{
    public function test_users_table_structure()
    {
        $this->assertTableExists('users');

        $this->assertTableColumns('users', [
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'phone',
            'role_id',
            'remember_token',
            'created_at',
            'updated_at',
        ]);
    }
}