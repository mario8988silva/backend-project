<?php

namespace Tests\Unit;

use App\Models\Family;
use Tests\BaseDatabaseTest;

class FamilyTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_family_table_can_be_exported()
    {
        $this->assertTableHasData(Family::class);
        $this->showTableDetails(Family::class);   // prints sample rows
        $this->assertFactoryCreates(Family::class); // confirms factory works
    }
}
