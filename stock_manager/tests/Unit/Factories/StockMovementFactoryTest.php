<?php

namespace Tests\Unit\Factories;

use App\Models\StockMovement;

class StockMovementFactoryTest extends BaseFactoryTest
{
    public function stock_movement_factory_creates_record()
    {
        $this->assertFactoryCreates(StockMovement::class);
    }

    public function stock_movement_factory_makes_record()
    {
        $this->assertFactoryMakes(StockMovement::class);
    }
}
