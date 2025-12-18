<?php

namespace Tests\Unit;

use App\Models\SoldProduct;
use Tests\BaseDatabaseTest;

class SoldProductTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_sold_product_table_can_be_exported()
    {
        $this->assertTableHasData(SoldProduct::class);
        $this->showTableDetails(SoldProduct::class);   // prints sample rows
        $this->assertFactoryCreates(SoldProduct::class); // confirms factory works
    }
}
