<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\StockSeeder;

class StockSeederTest extends BaseSeederTest
{
    public function test_stock_seeder_populates_table()
    {
        $this->runSeeder(StockSeeder::class);

        $this->assertTableHasRows('stocks', 50);

        $this->assertColumnsNotNull('stocks', ['product_id', 'status_id']);
    }
}
