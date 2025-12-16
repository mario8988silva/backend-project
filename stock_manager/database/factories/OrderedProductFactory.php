<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderedProduct>
 */
class OrderedProductFactory extends Factory
{
    protected $model = OrderedProduct::class;

    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 50),
            'product_id' => Product::factory(),
            'order_id' => Order::factory(),
            'expiry_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}