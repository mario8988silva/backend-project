<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subcategory>
 */
class SubcategoryFactory extends Factory
{
    protected $model = Subcategory::class;

    public function definition(): array
    {
        return [
            'category_id' => $this->randomExistingCategoryOrNull(), // auto-create/link a Category
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
        ];
    }
    protected function randomExistingCategoryOrNull()
    {
        // Get a random existing Category 
        $existing = Category::inRandomOrder()->first();
        // If Category exist → return either null or an existing one 
        if ($existing) {
            return $this->faker->boolean(10) // 10% chance of null 
                ? null
                : $existing->id; // 90% chance of existing Category 
        } // If NO Category exist → ALWAYS return null 
        return null;
    }
}
