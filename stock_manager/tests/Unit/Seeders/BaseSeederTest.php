<?php

namespace Tests\Unit\Seeders;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

abstract class BaseSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Run a specific seeder class.
     */
    protected function runSeeder(string $seederClass): void
    {
        $this->seed($seederClass);
    }

    /**
     * Assert that a table contains at least the given number of rows.
     */
    protected function assertTableHasRows(string $table, int $minRows = 1): void
    {
        $count = DB::table($table)->count();

        $this->assertTrue(
            $count >= $minRows,
            "Failed asserting that table [$table] has at least [$minRows] rows. Found [$count]."
        );
    }

    /**
     * Assert that a specific row exists in the table.
     */
    protected function assertRowExists(string $table, array $attributes): void
    {
        $this->assertDatabaseHas($table, $attributes);
    }

    /**
     * Assert that specific columns are not null for at least one row.
     */
    protected function assertColumnsNotNull(string $table, array $columns): void
    {
        foreach ($columns as $column) {
            $exists = DB::table($table)->whereNotNull($column)->exists();

            $this->assertTrue(
                $exists,
                "Failed asserting that column [$column] in table [$table] contains non-null values."
            );
        }
    }
}
