<?php

namespace Tests\Unit\Migrations;

class CategoryHasSupplierMigrationTest extends BaseMigrationTest
{
    public function test_category_has_suppliers_table_structure()
    {
        $this->assertTableExists('category_has_suppliers');

        $this->assertTableColumns('category_has_suppliers', [
            'id',
            'category_id',
            'supplier_id',
            'created_at',
            'updated_at',
        ]);
    }
}
