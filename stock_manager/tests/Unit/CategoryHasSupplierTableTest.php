<?php

namespace Tests\Unit;

use App\Models\CategoryHasSupplier;
use Tests\BaseDatabaseTest;

class CategoryHasSupplierTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_category_has_supplier_table_can_be_exported()
    {
        $this->assertTableHasData(CategoryHasSupplier::class);
        $this->showTableDetails(CategoryHasSupplier::class);   // prints sample rows
        $this->assertFactoryCreates(CategoryHasSupplier::class); // confirms factory works        
    }
}
