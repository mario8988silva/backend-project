<?php

namespace Tests\Unit;

use App\Models\Supplier;
use Tests\BaseDatabaseTest;

class SupplierTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_supplier_table_can_be_exported()
    {
        $this->assertTableHasData(Supplier::class);
    }
}
