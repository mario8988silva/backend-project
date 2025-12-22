<?php

namespace Tests\Unit\Seeders;

use App\Models\Family;
use Database\Seeders\FamilySeeder;

class FamilySeederTest extends BaseSeederTest
{
    public function test_family_seeder_populates_table()
    {
        $this->runSeeder(FamilySeeder::class);

        // Seeder inserts exactly 10 families
        $this->assertTableHasRows('families', 10);

        // Ensure required fields are not null for at least one row
        $this->assertColumnsNotNull('families', [
            'name',
        ]);
    }
}
