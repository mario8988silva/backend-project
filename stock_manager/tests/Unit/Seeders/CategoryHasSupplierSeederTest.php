<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\CategoryHasSupplierSeeder;
use Illuminate\Support\Facades\Schema;

class CategoryHasSupplierSeederTest extends BaseSeederTest
{
    public function test_category_has_supplier_seeder_runs()
    {
        $this->runSeeder(CategoryHasSupplierSeeder::class);

        // No rows expected, just ensure table exists and seeder doesn't crash
        $this->assertTrue(
            Schema::hasTable('category_has_suppliers'),
            'Table [category_has_suppliers] does not exist after running the seeder.'
        );
    }
}
