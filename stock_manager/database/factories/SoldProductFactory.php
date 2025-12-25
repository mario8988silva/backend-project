<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

use Database\Factories\Concerns\PicksExistingOrNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldProduct>
 */
class SoldProductFactory extends Factory
{
    use PicksExistingOrNull;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $quantity = $this->faker->numberBetween(1, 10);
        $price = $this->faker->randomFloat(2, 1, 100);

        return [
            'product_id' => Product::inRandomOrder()->first()?->id
                ?? Product::factory()->create()->id,

            'order_id' => $this->randomExistingOrNull(Order::class),

            'quantity' => $quantity,
            'price' => $price,
            'total' => $quantity * $price,
            'sold_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'location' => $this->faker->optional()->city(),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
