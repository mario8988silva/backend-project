<?php

namespace Tests\Unit\Migrations;

class RepresentativeMigrationTest extends BaseMigrationTest
{
    public function test_representatives_table_structure()
    {
        $this->assertTableExists('representatives');

        $this->assertTableColumns('representatives', [
            'id',
            'name',
            'phone',
            'email',
            'supplier_id',
            'notes',
            'created_at',
            'updated_at',
        ]);
    }
}
