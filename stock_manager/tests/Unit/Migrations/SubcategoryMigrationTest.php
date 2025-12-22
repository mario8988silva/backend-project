<?php

namespace Tests\Unit\Migrations;

class SubcategoryMigrationTest extends BaseMigrationTest
{
    public function test_subcategories_table_structure()
    {
        $this->assertTableExists('subcategories');

        $this->assertTableColumns('subcategories', [
            'id',
            'category_id',
            'name',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
