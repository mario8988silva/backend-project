<?php

namespace Tests\Unit\Factories;

use App\Models\Stock;

class StockFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Stock::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Stock::class);
    }
}
