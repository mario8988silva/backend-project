<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class FamiliesMigrationTest extends BaseMigrationTest
{
    public function test_families_table_structure()
    {
        $this->assertTableExists('families');

        $this->assertTableColumns('families', [
            'id',
            'name',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
