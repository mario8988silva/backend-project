<?php

namespace Tests\Unit;

use App\Models\StockMovement;
use Tests\BaseDatabaseTest;

class StockMovementTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_stock_movement_table_can_be_exported()
    {
        $this->assertTableHasData(StockMovement::class);
        $this->showTableDetails(StockMovement::class);   // prints sample rows
        $this->assertFactoryCreates(StockMovement::class); // confirms factory works
    }
}
