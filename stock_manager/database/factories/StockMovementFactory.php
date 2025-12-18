<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockMovement>
 */
class StockMovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::inRandomOrder()->first()?->id,
            'quantity' => $this->faker->numberBetween(1, 50),
            'movement_type' => $this->faker->randomElement(['in', 'out']),
            'notes' => $this->faker->optional()->sentence(),
            'moved_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
