<?php

namespace Tests\Unit;

use App\Models\UnitType;
use Tests\BaseDatabaseTest;

class UnitTypeTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_unit_type_table_can_be_exported()
    {
        $this->assertTableHasData(UnitType::class);
    }
}
