<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class BaseDatabaseTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(); // seed all tables before each test
    }

    /**
     * Assert that a table has at least one row.
     */
    protected function assertTableHasData(string $modelClass)
    {
        $count = $modelClass::count();
        $this->assertTrue($count > 0, "$modelClass has no data");
        fwrite(STDOUT, "\n✔ $modelClass has $count rows\n");
    }

    /**
     * Show sample rows from a table for inspection.
     */
    protected function showTableDetails(string $modelClass, int $limit = 3)
    {
        $rows = $modelClass::limit($limit)->get()->toArray();
        fwrite(STDOUT, "\n🔎 Sample $modelClass rows:\n" . print_r($rows, true) . "\n");
    }

    /**
     * Assert that a factory can create a valid entry.
     */
    protected function assertFactoryCreates(string $modelClass)
    {
        $instance = $modelClass::factory()->create();
        $this->assertNotNull($instance->id, "$modelClass factory failed to create a record");
        fwrite(STDOUT, "\n✨ Factory created: " . print_r($instance->toArray(), true) . "\n");
    }
}
