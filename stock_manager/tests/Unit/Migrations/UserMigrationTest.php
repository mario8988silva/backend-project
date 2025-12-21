<?php

namespace Tests\Unit\Migrations;

class UsersMigrationTest extends BaseMigrationTest
{
    public function test_users_table_structure()
    {
        $this->assertTableExists('users');

        $this->assertTableColumns('users', [
            'id',
            'created_at',
            'updated_at',
            'name',
            'email',
            'email_verified_at',
            'password',
            'phone',
            'role_id',
            'remember_token',
        ]);
    }

    public function test_password_reset_tokens_table_structure()
    {
        $this->assertTableExists('password_reset_tokens');

        $this->assertTableColumns('password_reset_tokens', [
            'email',
            'token',
            'created_at',
        ]);
    }

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
