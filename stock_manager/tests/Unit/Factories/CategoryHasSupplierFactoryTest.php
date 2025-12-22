<?php

namespace Tests\Unit\Factories;

use App\Models\Category;
use App\Models\CategoryHasSupplier;
use App\Models\Supplier;

class CategoryHasSupplierFactoryTest extends BaseFactoryTest
{
    public function test_category_has_supplier_factory_creates()
    {
        Category::factory()->create();
        Supplier::factory()->create();

        $this->assertFactoryCreates(CategoryHasSupplier::class);
    }

    public function test_category_has_supplier_factory_makes()
    {
        Category::factory()->create();
        Supplier::factory()->create();

        $this->assertFactoryMakes(CategoryHasSupplier::class);
    }

    public function test_category_has_supplier_factory_generates_valid_attributes()
    {
        Category::factory()->count(2)->create();
        Supplier::factory()->count(2)->create();

        $instance = CategoryHasSupplier::factory()->make();

        $this->assertTrue(
            Category::where('id', $instance->category_id)->exists()
        );

        $this->assertTrue(
            Supplier::where('id', $instance->supplier_id)->exists()
        );
    }
}
