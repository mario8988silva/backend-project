<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class CategoriesMigrationTest extends BaseMigrationTest
{
    public function test_categories_table_structure()
    {
        $this->assertTableExists('categories');

        $this->assertTableColumns('categories', [
            'id',
            'family_id',
            'name',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
