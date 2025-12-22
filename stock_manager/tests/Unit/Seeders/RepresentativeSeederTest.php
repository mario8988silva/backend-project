<?php

namespace Tests\Unit\Seeders;

use App\Models\Supplier;
use Database\Seeders\RepresentativeSeeder;

class RepresentativeSeederTest extends BaseSeederTest
{
    public function test_representative_seeder_populates_table()
    {
        Supplier::factory()->count(5)->create();

        $this->runSeeder(RepresentativeSeeder::class);

        $this->assertTableHasRows('representatives', 5); // minimum 1 per supplier

        $this->assertColumnsNotNull('representatives', ['name']);
    }
}
