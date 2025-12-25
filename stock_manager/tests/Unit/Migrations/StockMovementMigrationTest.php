<?php

namespace Tests\Unit\Migrations;

class StockMovementMigrationTest extends BaseMigrationTest
{
    public function test_stock_movements_table_structure()
    {
        $this->assertTableExists('stock_movements');

        $this->assertTableColumns('stock_movements', [
            'id',
            'product_id',
            'quantity',
            'movement_type',
            'order_id',
            'stock_id',
            'moved_at',
            'notes',
            'created_at',
            'updated_at',
        ]);
    }
}
