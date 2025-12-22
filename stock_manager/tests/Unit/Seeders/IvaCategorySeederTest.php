<?php

namespace Tests\Unit\Seeders;

use App\Models\IvaCategory;
use Database\Seeders\IvaCategorySeeder;

class IvaCategorySeederTest extends BaseSeederTest
{
    public function test_iva_category_seeder_populates_table()
    {
        // Run the seeder
        $this->runSeeder(IvaCategorySeeder::class);

        // Should create exactly 4 IVA categories
        $this->assertTableHasRows('iva_categories', 4);

        // Expected IVA categories
        $expected = [
            ['name' => 'Standard',     'rate' => 23.00],
            ['name' => 'Intermediate', 'rate' => 13.00],
            ['name' => 'Reduced',      'rate' => 6.00],
            ['name' => 'Exempt',       'rate' => 0.00],
        ];

        foreach ($expected as $iva) {
            $this->assertRowExists('iva_categories', $iva);
        }

        // Ensure description is not null for at least one row
        $this->assertColumnsNotNull('iva_categories', ['description']);
    }
}
