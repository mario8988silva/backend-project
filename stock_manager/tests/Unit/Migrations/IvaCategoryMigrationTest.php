<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class IvaCategoriesMigrationTest extends BaseMigrationTest
{
    public function test_iva_categories_table_structure()
    {
        $this->assertTableExists('iva_categories');

        $this->assertTableColumns('iva_categories', [
            'id',
            'name',
            'rate',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
