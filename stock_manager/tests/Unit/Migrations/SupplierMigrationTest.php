<?php

namespace Tests\Unit\Migrations;

class SupplierMigrationTest extends BaseMigrationTest
{
    public function test_suppliers_table_structure()
    {
        $this->assertTableExists('suppliers');

        $this->assertTableColumns('suppliers', [
            'id',
            'name',
            'phone',
            'email',
            'address',
            'notes',
            'created_at',
            'updated_at',
        ]);
    }
}
