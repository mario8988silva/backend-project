<?php

namespace Tests\Unit\Migrations;

class OrderMigrationTest extends BaseMigrationTest
{
    public function test_orders_table_structure()
    {
        $this->assertTableExists('orders');

        $this->assertTableColumns('orders', [
            'id',
            'representative_id',
            'user_id',
            'order_date',
            'delivery_date',
            //'invoice_id',
            'status_id',
            'created_at',
            'updated_at',
        ]);
    }
}
