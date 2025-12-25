<?php

namespace Tests\Unit\Migrations;

class OrderHasProductMigrationTest extends BaseMigrationTest
{
    public function test_order_has_products_table_structure()
    {
        $this->assertTableExists('order_has_products');

        $this->assertTableColumns('order_has_products', [
            'id',
            'order_id',
            'product_id',
            'quantity',
            'expiry_date',
            'created_at',
            'updated_at',
        ]);
    }
}
