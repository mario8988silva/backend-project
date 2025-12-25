<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\SoldProductSeeder;

class SoldProductSeederTest extends BaseSeederTest
{
    public function test_sold_product_seeder_populates_table()
    {
        $this->runSeeder(SoldProductSeeder::class);

        $this->assertTableHasRows('sold_products', 50);

        $this->assertColumnsNotNull('sold_products', ['product_id', 'quantity']);
    }
}
