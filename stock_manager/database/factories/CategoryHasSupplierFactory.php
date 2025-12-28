<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Database\Factories\Concerns\PicksExistingOrNull;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryHasSupplier>
 */
class CategoryHasSupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
        ];
    }
}
