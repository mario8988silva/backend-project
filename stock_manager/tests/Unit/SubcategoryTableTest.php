<?php

namespace Tests\Unit;

use App\Models\Subcategory;
use Tests\BaseDatabaseTest;

class SubcategoryTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_subcategory_table_can_be_exported()
    {
        $this->assertTableHasData(Subcategory::class);
    }
}
