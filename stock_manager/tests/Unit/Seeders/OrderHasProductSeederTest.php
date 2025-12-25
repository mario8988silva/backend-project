<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\OrderHasProductSeeder;

class OrderHasProductSeederTest extends BaseSeederTest
{
    public function test_order_has_product_seeder_populates_table()
    {
        $this->runSeeder(OrderHasProductSeeder::class);

        $this->assertTableHasRows('order_has_products', 50);

        $this->assertColumnsNotNull('order_has_products', ['order_id', 'product_id']);
    }
}
