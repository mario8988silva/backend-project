<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\Concerns\PicksExistingOrNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockMovement>
 */
class StockMovementFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 50),
            'movement_type' => $this->faker->randomElement(['in', 'out']),
            'order_id' => $this->randomExistingOrNull(Order::class),
            'stock_id' => $this->randomExistingOrNull(Stock::class),
            'moved_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
