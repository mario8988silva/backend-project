<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\SupplierSeeder;

class SupplierSeederTest extends BaseSeederTest
{
    public function test_supplier_seeder_populates_table()
    {
        $this->runSeeder(SupplierSeeder::class);

        $this->assertTableHasRows('suppliers', 20);

        $this->assertColumnsNotNull('suppliers', ['name']);
    }
}
