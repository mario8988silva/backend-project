<?php

namespace Database\Factories;

use App\Models\OrderedProduct;
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
            'ordered_product_id' => OrderedProduct::factory(),
            'status_id' => Status::factory(),
            'quantity' => $this->faker->numberBetween(0, 200),
            'location' => $this->faker->word,
        ];
    }
}
