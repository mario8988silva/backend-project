<?php

namespace Tests\Unit\Factories;

use App\Models\Supplier;

class SupplierFactoryTest extends BaseFactoryTest
{
    public function supplier_factory_creates_record()
    {
        $this->assertFactoryCreates(Supplier::class);
    }

    public function supplier_factory_makes_record()
    {
        $this->assertFactoryMakes(Supplier::class);
    }
}
