<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Representative;
use App\Models\Status;
use App\Models\User;
use Database\Factories\Concerns\PicksExistingOrNull;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'representative_id' => $this->randomExistingOrNull(Representative::class),
            'user_id' => $this->randomExistingOrNull(User::class),
            'order_date' => $this->faker->date(),
            'delivery_date' => $this->faker->date(),
            //'invoice_id' => $this->randomExistingOrNull(Invoice::class),
            'status_id' => $this->randomExistingOrNull(Status::class),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($order) {
            $product = Product::inRandomOrder()->first();

            if ($product) {
                $order->products()->attach($product->id, [
                    'quantity' => $this->faker->numberBetween(1, 20),
                    'expiry_date' => $this->faker->dateTimeBetween('now', '+1 year'),
                ]);
            }
        });
    }
}
