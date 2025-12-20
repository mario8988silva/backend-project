<?php

namespace Tests\Unit\Factories;

use App\Models\WasteLog;

class WasteLogFactoryTest extends BaseFactoryTest
{
    public function waste_log_creates_record()
    {
        $this->assertFactoryCreates(WasteLog::class);
    }

    public function waste_log_makes_record()
    {
        $this->assertFactoryMakes(WasteLog::class);
    }
}
