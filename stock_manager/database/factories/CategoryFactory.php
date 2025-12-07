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
            'family_id' => Family::factory(), // auto-create/link a Family
            'name' => $this->faker->word(),   // fake category name
            'description' => $this->faker->sentence(), // optional description
        ];
    }
}