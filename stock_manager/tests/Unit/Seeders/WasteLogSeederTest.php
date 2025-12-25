<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\WasteLogSeeder;

class WasteLogSeederTest extends BaseSeederTest
{
    public function test_waste_log_seeder_populates_table()
    {
        $this->runSeeder(WasteLogSeeder::class);

        $this->assertTableHasRows('waste_logs', 30);

        $this->assertColumnsNotNull('waste_logs', ['product_id', 'quantity', 'status_id']);
    }
}
