<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\EcoScore;
use App\Models\IvaCategory;
use App\Models\NutriScore;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\UnitType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'barcode' => $this->faker->unique()->ean13(), // realistic barcode
            'name' => $this->faker->word(),        // requires faker extension, fallback: word()
            'image' => $this->faker->imageUrl(640, 480, 'food', true), // fake product image
            'description' => $this->faker->sentence(),

            // Foreign keys (auto-create related models if not provided)
            'unit_type_id' => UnitType::inRandomOrder()->first()?->id,
            'iva_category_id' => IvaCategory::inRandomOrder()->first()?->id,
            'brand_id' => Brand::inRandomOrder()->first()?->id,
            'subcategory_id' => Subcategory::inRandomOrder()->first()?->id,
            'nutri_score_id' => NutriScore::inRandomOrder()->first()?->id,
            'eco_score_id' => EcoScore::inRandomOrder()->first()?->id,

            // Attributes
            'sugar_free' => $this->faker->boolean(),
            'gluten_free' => $this->faker->boolean(),
            'lactose_free' => $this->faker->boolean(),
            'vegan' => $this->faker->boolean(),
            'vegetarian' => $this->faker->boolean(),
            'organic' => $this->faker->boolean(),
        ];
    }
}
