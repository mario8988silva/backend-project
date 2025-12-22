<?php

namespace Tests\Unit\Factories;

use App\Models\Category;
use App\Models\Family;

class CategoryFactoryTest extends BaseFactoryTest
{
    public function test_category_factory_creates()
    {
        $this->assertFactoryCreates(Category::class);
    }

    public function test_category_factory_makes()
    {
        $this->assertFactoryMakes(Category::class);
    }

    public function test_category_factory_family_id_may_be_null_or_existing()
    {
        Family::factory()->count(3)->create();

        $instance = Category::factory()->make();

        $this->assertTrue(
            $instance->family_id === null ||
            Family::where('id', $instance->family_id)->exists()
        );
    }
}
