<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

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
            'supplier_id',
            'notes',
            'created_at',
            'updated_at',
        ]);
    }
}
