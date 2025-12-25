<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\StockMovementSeeder;

class StockMovementSeederTest extends BaseSeederTest
{
    public function test_stock_movement_seeder_populates_table()
    {
        $this->runSeeder(StockMovementSeeder::class);

        $this->assertTableHasRows('stock_movements', 50);

        $this->assertColumnsNotNull('stock_movements', ['product_id', 'quantity', 'movement_type']);
    }
}
