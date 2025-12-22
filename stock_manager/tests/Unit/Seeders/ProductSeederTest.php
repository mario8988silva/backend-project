<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\ProductSeeder;

class ProductSeederTest extends BaseSeederTest
{
    public function test_product_seeder_populates_table()
    {
        $this->runSeeder(ProductSeeder::class);

        $this->assertTableHasRows('products', 100);

        // Only name is guaranteed to be non-null
        $this->assertColumnsNotNull('products', ['name']);
    }
}
