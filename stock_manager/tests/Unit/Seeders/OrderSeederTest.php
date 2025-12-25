<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\OrderSeeder;

class OrderSeederTest extends BaseSeederTest
{
    public function test_order_seeder_populates_table()
    {
        $this->runSeeder(OrderSeeder::class);

        $this->assertTableHasRows('orders', 50);

        $this->assertColumnsNotNull('orders', ['representative_id', 'status_id']);
    }
}
