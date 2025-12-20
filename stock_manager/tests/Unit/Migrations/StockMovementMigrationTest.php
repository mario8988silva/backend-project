<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class StockMovementMigrationTest extends BaseMigrationTest
{
    public function test_stock_movements_table_structure()
    {
        $this->assertTableExists('stock_movements');

        $this->assertTableColumns('stock_movements', [
            'id',
            'created_at',
            'updated_at',
        ]);
    }
}
