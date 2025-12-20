<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class UnitTypesMigrationTest extends BaseMigrationTest
{
    public function test_unit_types_table_structure()
    {
        $this->assertTableExists('unit_types');

        $this->assertTableColumns('unit_types', [
            'id',
            'name',
            'symbol',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
