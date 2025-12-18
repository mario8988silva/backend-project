<?php

namespace Tests\Unit;

use App\Models\IvaCategory;
use Tests\BaseDatabaseTest;

class IvaCategoryTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_iva_category_table_can_be_exported()
    {
        $this->assertTableHasData(IvaCategory::class);
        $this->showTableDetails(IvaCategory::class);   // prints sample rows
        $this->assertFactoryCreates(IvaCategory::class); // confirms factory works
    }
}
