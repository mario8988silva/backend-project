<?php

namespace Database\Factories;

use App\Models\OrderedProduct;
use App\Models\OrderHasProduct;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->first()?->id,
            'ordered_product_id' => OrderHasProduct::inRandomOrder()->first()?->id,
            'status_id' => Status::inRandomOrder()->first()?->id,
            'quantity' => $this->faker->numberBetween(0, 100),
            'location' => $this->faker->optional()->word(),
        ];
    }
}
