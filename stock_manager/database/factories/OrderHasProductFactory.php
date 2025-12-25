<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderHasProduct>
 */
use Database\Factories\Concerns\PicksExistingOrNull;

class OrderHasProductFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'order_id' => $this->randomExistingOrNull(Order::class),
            'product_id' => $this->randomExistingOrNull(Product::class),
            'quantity' => $this->faker->numberBetween(1, 50),
            'expiry_date' => $this->faker->optional()->dateTimeBetween('now', '+2 years'),
        ];
    }
}
