<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'family_id' => $this->randomExistingFamilyOrNull(), // auto-create/link a Family
            'name' => $this->faker->word(),   // fake category name
            'description' => $this->faker->sentence(), // optional description
        ];
    }

    protected function randomExistingFamilyOrNull()
    {
        // Get a random existing family 
        $existing = Family::inRandomOrder()->first();
        // If families exist → return either null or an existing one 
        if ($existing) {
            return $this->faker->boolean(10) // 10% chance of null 
                ? null
                : $existing->id; // 90% chance of existing family 
        } // If NO families exist → ALWAYS return null 
        return null;
    }
}
