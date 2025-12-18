<?php

namespace Tests\Unit;

use App\Models\OrderHasProduct;
use Tests\BaseDatabaseTest;

class OrderHasProductTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_order_has_product_table_can_be_exported()
    {
        $this->assertTableHasData(OrderHasProduct::class);
        $this->showTableDetails(OrderHasProduct::class);   // prints sample rows
        $this->assertFactoryCreates(OrderHasProduct::class); // confirms factory works
    }
}
