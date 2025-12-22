<?php

namespace Tests\Unit\Migrations;

class BrandMigrationTest extends BaseMigrationTest
{
    public function test_brands_table_structure()
    {
        $this->assertTableExists('brands');

        $this->assertTableColumns('brands', [
            'id',
            'name',
            'country',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
