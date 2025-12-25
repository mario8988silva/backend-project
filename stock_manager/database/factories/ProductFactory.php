<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\EcoScore;
use App\Models\IvaCategory;
use App\Models\NutriScore;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\UnitType;
use Database\Factories\Concerns\PicksExistingOrNull;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    use PicksExistingOrNull;

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'barcode' => $this->faker->unique()->ean13(),
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
            'description' => $this->faker->sentence(),

            'unit_type_id' => $this->randomExistingOrNull(UnitType::class),
            'iva_category_id' => $this->randomExistingOrNull(IvaCategory::class),
            'brand_id' => $this->randomExistingOrNull(Brand::class),
            'subcategory_id' => $this->randomExistingOrNull(Subcategory::class),
            'nutri_score_id' => $this->randomExistingOrNull(NutriScore::class),
            'eco_score_id' => $this->randomExistingOrNull(EcoScore::class),

            'sugar_free' => $this->faker->boolean(),
            'gluten_free' => $this->faker->boolean(),
            'lactose_free' => $this->faker->boolean(),
            'vegan' => $this->faker->boolean(),
            'vegetarian' => $this->faker->boolean(),
            'organic' => $this->faker->boolean(),
        ];
    }
}
