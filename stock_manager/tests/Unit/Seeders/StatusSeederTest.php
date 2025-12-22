<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\StatusSeeder;

class StatusSeederTest extends BaseSeederTest
{
    public function test_status_seeder_populates_table()
    {
        $this->runSeeder(StatusSeeder::class);

        $this->assertTableHasRows('statuses', 12);

        $this->assertColumnsNotNull('statuses', ['name']);
    }
}
