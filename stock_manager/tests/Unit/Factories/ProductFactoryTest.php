<?php

namespace Tests\Unit\Factories;

use App\Models\Brand;
use App\Models\EcoScore;
use App\Models\IvaCategory;
use App\Models\NutriScore;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\UnitType;

class ProductFactoryTest extends BaseFactoryTest
{
    public function test_product_factory_creates()
    {
        $this->assertFactoryCreates(Product::class);
    }

    public function test_product_factory_makes()
    {
        $this->assertFactoryMakes(Product::class);
    }

    public function test_product_factory_foreign_keys_may_be_null_or_existing()
    {
        // Seed some parent rows so the factory can pick them
        UnitType::factory()->count(2)->create();
        IvaCategory::factory()->count(2)->create();
        Brand::factory()->count(2)->create();
        Subcategory::factory()->count(2)->create();
        NutriScore::factory()->count(2)->create();
        EcoScore::factory()->count(2)->create();

        $instance = Product::factory()->make();

        $this->assertTrue(
            $instance->unit_type_id === null ||
            UnitType::where('id', $instance->unit_type_id)->exists()
        );

        $this->assertTrue(
            $instance->iva_category_id === null ||
            IvaCategory::where('id', $instance->iva_category_id)->exists()
        );

        $this->assertTrue(
            $instance->brand_id === null ||
            Brand::where('id', $instance->brand_id)->exists()
        );

        $this->assertTrue(
            $instance->subcategory_id === null ||
            Subcategory::where('id', $instance->subcategory_id)->exists()
        );

        $this->assertTrue(
            $instance->nutri_score_id === null ||
            NutriScore::where('id', $instance->nutri_score_id)->exists()
        );

        $this->assertTrue(
            $instance->eco_score_id === null ||
            EcoScore::where('id', $instance->eco_score_id)->exists()
        );
    }
}
