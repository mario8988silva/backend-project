<?php

namespace Tests\Unit\Seeders;

use App\Models\UnitType;
use Database\Seeders\UnitTypeSeeder;

class UnitTypeSeederTest extends BaseSeederTest
{
    public function test_unit_type_seeder_populates_table()
    {
        $this->runSeeder(UnitTypeSeeder::class);

        // Seeder inserts exactly 8 units
        $this->assertTableHasRows('unit_types', 8);

        $expectedUnits = [
            ['name' => 'Unit', 'symbol' => 'u'],
            ['name' => 'Gram', 'symbol' => 'g'],
            ['name' => 'Kilogram', 'symbol' => 'kg'],
            ['name' => 'Liter', 'symbol' => 'L'],
            ['name' => 'Milliliter', 'symbol' => 'mL'],
            ['name' => 'Meter', 'symbol' => 'm'],
            ['name' => 'Square Meter', 'symbol' => 'm²'],
            ['name' => 'Cubic Meter', 'symbol' => 'm³'],
        ];

        foreach ($expectedUnits as $unit) {
            $this->assertRowExists('unit_types', $unit);
        }

        // Ensure description is not null for at least one row
        $this->assertColumnsNotNull('unit_types', ['description']);
    }
}
