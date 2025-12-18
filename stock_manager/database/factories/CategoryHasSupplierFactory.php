<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'category_id' => \App\Models\Category::inRandomOrder()->first()?->id,
            'supplier_id' => \App\Models\Supplier::inRandomOrder()->first()?->id,
        ];
    }
}
