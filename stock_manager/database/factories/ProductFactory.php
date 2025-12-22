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

    protected function randomExistingOrNull($model)
    {
        $existing = $model::inRandomOrder()->first();
        if ($existing) {
            return $this->faker->boolean(10) // 10% null 
                ? null
                : $existing->id; // 90% existing 
        }
        return null; // no rows exist 
    }

    public function definition(): array
    {
        return [
            'barcode' => $this->faker->unique()->ean13(), // realistic barcode
            'name' => $this->faker->word(),        // requires faker extension, fallback: word()
            'image' => $this->faker->imageUrl(640, 480, 'food', true), // fake product image
            'description' => $this->faker->sentence(),

            // Foreign keys (auto-create related models if not provided)
            'unit_type_id' => $this->randomExistingOrNull(UnitType::class),
            'iva_category_id' => $this->randomExistingOrNull(IvaCategory::class),
            'brand_id' => $this->randomExistingOrNull(Brand::class),
            'subcategory_id' => $this->randomExistingOrNull(Subcategory::class),
            'nutri_score_id' => $this->randomExistingOrNull(NutriScore::class),
            'eco_score_id' => $this->randomExistingOrNull(EcoScore::class),

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
