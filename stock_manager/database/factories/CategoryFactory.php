<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Family;
use Database\Factories\Concerns\PicksExistingOrNull;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    use PicksExistingOrNull;

    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'family_id' => $this->randomExistingOrNull(Family::class),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
