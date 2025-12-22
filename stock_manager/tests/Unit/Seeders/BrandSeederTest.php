<?php

namespace Tests\Unit\Seeders;

use App\Models\Brand;
use Database\Seeders\BrandSeeder;

class BrandSeederTest extends BaseSeederTest
{
    public function test_brand_seeder_populates_table()
    {
        $this->runSeeder(BrandSeeder::class);

        // Seeder inserts exactly 15 brands
        $this->assertTableHasRows('brands', 15);

        // Ensure required fields are not null for at least one row
        $this->assertColumnsNotNull('brands', [
            'name',
            'country',
        ]);
    }
}
