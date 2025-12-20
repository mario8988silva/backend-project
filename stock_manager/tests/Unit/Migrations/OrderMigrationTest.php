<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class OrderMigrationTest extends BaseMigrationTest
{
    public function test_orders_table_structure()
    {
        $this->assertTableExists('orders');

        $this->assertTableColumns('orders', [
            'id',
            'quantity',
            'product_id',
            'representative_id',
            'team_id',
            'order_date',
            'delivery_date',
            'invoice_id',
            'status_id',
            'created_at',
            'updated_at',
        ]);
    }
}
