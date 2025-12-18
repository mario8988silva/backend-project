<?php

namespace Tests\Unit;

use App\Models\Status;
use Tests\BaseDatabaseTest;

class StatusTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_status_table_can_be_exported()
    {
        $this->assertTableHasData(Status::class);
        $this->showTableDetails(Status::class);   // prints sample rows
        $this->assertFactoryCreates(Status::class); // confirms factory works
    }
}
