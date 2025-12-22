<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\CategorySeeder;

class CategorySeederTest extends BaseSeederTest
{
    public function test_category_seeder_populates_table()
    {
        $this->runSeeder(CategorySeeder::class);

        $this->assertTableHasRows('categories', 20);

        // Only name is guaranteed to be non-null
        $this->assertColumnsNotNull('categories', ['name']);
    }
}
