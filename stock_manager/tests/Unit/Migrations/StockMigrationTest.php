<?php

namespace Tests\Unit\Migrations;

class StockMigrationTest extends BaseMigrationTest
{
    public function test_stocks_table_structure()
    {
        $this->assertTableExists('stocks');

        $this->assertTableColumns('stocks', [
            'id',
            'product_id',
            'order_has_product_id',
            'status_id',
            'quantity',
            'location',
            'created_at',
            'updated_at',
        ]);
    }
}
