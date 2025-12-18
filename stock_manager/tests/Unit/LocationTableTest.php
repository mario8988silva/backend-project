<?php

namespace Tests\Unit;

use App\Models\Location;
use Tests\BaseDatabaseTest;

class LocationTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_location_table_can_be_exported()
    {
        $this->assertTableHasData(Location::class);
        $this->showTableDetails(Location::class);   // prints sample rows
        $this->assertFactoryCreates(Location::class); // confirms factory works
    }
}
