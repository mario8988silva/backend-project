<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\OrderSeeder;

class OrderSeederTest extends BaseSeederTest
{
    public function test_order_seeder_populates_table()
    {
        $this->runSeeder(OrderSeeder::class);

        // Should create 50 orders
        $this->assertTableHasRows('orders', 50);

        // Only supplier_id is mandatory
        $this->assertColumnsNotNull('orders', ['supplier_id']);
    }
}
