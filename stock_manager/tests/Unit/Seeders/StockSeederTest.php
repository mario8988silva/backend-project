<?php

namespace Tests\Unit\Seeders;


use Database\Seeders\StockSeeder;

class StockMovementSeederTest extends BaseSeederTest
{
    public function test_stock_movement_seeder_populates_table()
    {
        $this->runSeeder(StockSeeder::class);

        $this->assertTableHasRows('stocks', 50);

        $this->assertColumnsNotNull('stocks', ['product_id']);
    }
}
