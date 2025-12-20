<?php

namespace Tests\Unit\Factories;

use App\Models\IvaCategory;

class IvaCategoryFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(IvaCategory::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(IvaCategory::class);
    }
}
