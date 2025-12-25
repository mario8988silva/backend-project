<?php

namespace Tests\Unit\Migrations;

class SoldProductMigrationTest extends BaseMigrationTest
{
    public function test_sold_products_table_structure()
    {
        $this->assertTableExists('sold_products');

        $this->assertTableColumns('sold_products', [
            'id',
            'product_id',
            'order_id',
            'quantity',
            'price',
            'total',
            'sold_at',
            'location',
            'notes',
            'created_at',
            'updated_at',
        ]);
    }
}
