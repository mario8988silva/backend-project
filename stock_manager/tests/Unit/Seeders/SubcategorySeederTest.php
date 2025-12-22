<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\SubcategorySeeder;

class SubcategorySeederTest extends BaseSeederTest
{
    public function test_subcategory_seeder_populates_table()
    {
        $this->runSeeder(SubcategorySeeder::class);

        $this->assertTableHasRows('subcategories', 40);

        // Only name is guaranteed to be non-null
        $this->assertColumnsNotNull('subcategories', ['name']);
    }
}
