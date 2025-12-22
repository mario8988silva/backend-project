<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\LocationSeeder;

class LocationSeederTest extends BaseSeederTest
{
    public function test_location_seeder_populates_table()
    {
        $this->runSeeder(LocationSeeder::class);

        $this->assertTableHasRows('locations', 4);

        $this->assertColumnsNotNull('locations', ['name']);
    }
}
