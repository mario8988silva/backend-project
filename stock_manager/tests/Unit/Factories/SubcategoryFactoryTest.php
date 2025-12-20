<?php

namespace Tests\Unit\Factories;

use App\Models\Subcategory;

class SubcategoryFactoryTest extends BaseFactoryTest
{
    public function subcategory_factory_creates_record()
    {
        $this->assertFactoryCreates(Subcategory::class);
    }

    public function subcategory_factory_makes_record()
    {
        $this->assertFactoryMakes(Subcategory::class);
    }
}
