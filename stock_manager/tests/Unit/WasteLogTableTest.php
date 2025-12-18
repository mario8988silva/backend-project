<?php

namespace Tests\Unit;

use App\Models\WasteLog;
use Tests\BaseDatabaseTest;

class WasteLogTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_waste_log_table_can_be_exported()
    {
        $this->assertTableHasData(WasteLog::class);
    }
}
