<?php

namespace Tests\Unit\Migrations;

class FamilyMigrationTest extends BaseMigrationTest
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
