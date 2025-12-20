<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class PasswordResetTokensMigrationTest extends BaseMigrationTest
{
    public function test_password_reset_tokens_table_structure()
    {
        $this->assertTableExists('password_reset_tokens');

        $this->assertTableColumns('password_reset_tokens', [
            'email',
            'token',
            'created_at',
        ]);
    }
}
