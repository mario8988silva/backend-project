<?php

namespace Tests\Unit\Factories;

use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryFactoryTest extends BaseFactoryTest
{
    public function test_subcategory_factory_creates()
    {
        $this->assertFactoryCreates(Subcategory::class);
    }

    public function test_subcategory_factory_makes()
    {
        $this->assertFactoryMakes(Subcategory::class);
    }

    public function test_subcategory_factory_category_id_may_be_null_or_existing()
    {
        Category::factory()->count(3)->create();

        $instance = Subcategory::factory()->make();

        $this->assertTrue(
            $instance->category_id === null ||
            Category::where('id', $instance->category_id)->exists()
        );
    }
}
