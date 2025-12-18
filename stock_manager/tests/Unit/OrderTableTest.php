<?php

namespace Tests\Unit;

use App\Models\Order;
use Tests\BaseDatabaseTest;

class OrderTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_order_table_can_be_exported()
    {
        $this->assertTableHasData(Order::class);
        $this->showTableDetails(Order::class);   // prints sample rows
        $this->assertFactoryCreates(Order::class); // confirms factory works
    }
}
