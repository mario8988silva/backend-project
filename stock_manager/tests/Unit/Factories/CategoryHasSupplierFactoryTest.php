<?php

namespace Tests\Unit\Factories;

use App\Models\CategoryHasSupplier;

class CategoryHasSupplierFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(CategoryHasSupplier::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(CategoryHasSupplier::class);
    }
}
