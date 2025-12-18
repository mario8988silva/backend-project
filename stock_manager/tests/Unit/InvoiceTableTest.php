<?php

namespace Tests\Unit;

use App\Models\Invoice;
use Tests\BaseDatabaseTest;

class InvoiceTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_invoice_table_can_be_exported()
    {
        $this->assertTableHasData(Invoice::class);
        $this->showTableDetails(Invoice::class);   // prints sample rows
        $this->assertFactoryCreates(Invoice::class); // confirms factory works
    }
}
