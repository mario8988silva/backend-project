<?php

namespace Tests\Unit\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

abstract class BaseMigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Assert that a table exists in the database.
     */
    protected function assertTableExists(string $table)
    {
        $this->assertTrue(
            Schema::hasTable($table),
            "Failed asserting that table [$table] exists."
        );
    }

    /**
     * Assert that a table contains the expected columns.
     */
    protected function assertTableColumns(string $table, array $expectedColumns)
    {
        foreach ($expectedColumns as $column) {
            $this->assertTrue(
                Schema::hasColumn($table, $column),
                "Failed asserting that column [$column] exists in table [$table]."
            );
        }
    }
}
