<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockMovement>
 */
class StockMovementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::inRandomOrder()->first()?->id,
            'quantity' => $this->faker->numberBetween(1, 50),
            'movement_type' => $this->faker->randomElement(['in', 'out']),
            'order_id' => \App\Models\Order::inRandomOrder()->first()?->id,
            'stock_id' => \App\Models\Stock::inRandomOrder()->first()?->id,
            'moved_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}

