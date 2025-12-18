<?php

namespace Tests\Unit;

use App\Models\Stock;
use Tests\BaseDatabaseTest;

class StockTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_stock_table_can_be_exported()
    {
        $this->assertTableHasData(Stock::class);
        $this->showTableDetails(Stock::class);   // prints sample rows
        $this->assertFactoryCreates(Stock::class); // confirms factory works
    }
}
