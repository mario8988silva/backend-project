<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

use Database\Factories\Concerns\PicksExistingOrNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderHasProduct>
 */


class OrderHasProductFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 50),
            'expiry_date' => $this->faker->optional()->dateTimeBetween('now', '+2 years'),
        ];
    }
}
