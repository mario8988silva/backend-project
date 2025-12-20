<?php

namespace Tests\Unit\Factories;

use App\Models\Category;

class CategoryFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Category::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Category::class);
    }
}
