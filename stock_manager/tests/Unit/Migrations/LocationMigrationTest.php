<?php

namespace Tests\Unit\Migrations;

class LocationMigrationTest extends BaseMigrationTest
{
    public function test_locations_table_structure()
    {
        $this->assertTableExists('locations');

        $this->assertTableColumns('locations', [
            'id',
            'name',
            'address',
            'type',
            'created_at',
            'updated_at',
        ]);
    }
}
