<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Database\Factories\Concerns\PicksExistingOrNull;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategory>
 */
class SubcategoryFactory extends Factory
{
    use PicksExistingOrNull;

    protected $model = Subcategory::class;

    public function definition(): array
    {
        return [
            'category_id' => $this->randomExistingOrNull(Category::class),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
