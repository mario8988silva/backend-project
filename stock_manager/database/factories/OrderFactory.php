<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\Concerns\PicksExistingOrNull;

use App\Models\Product;
use App\Models\Representative;
use App\Models\Status;
use App\Models\Supplier;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        // Always ensure a supplier exists 
        $supplier = Supplier::inRandomOrder()->first() ?? Supplier::factory()->create();

        // Representative is optional 
        $representative = $this->randomExistingOrNull(Representative::class);

        return [
            'representative_id' => $representative,
            'supplier_id' => $supplier->id,
            'user_id' => $this->randomExistingOrNull(User::class),
            'order_date' => $this->faker->date(),
            'delivery_date' => $this->faker->date(),
            'status_id' => $this->randomExistingOrNull(Status::class),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($order) {
            // Ensure at least one product exists 
            $product = Product::inRandomOrder()->first() ?? Product::factory()->create();
            // Attach product to order 
            $order->products()->attach($product->id, [
                'quantity' => $this->faker->numberBetween(1, 20),
                'expiry_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            ]);
        });
    }
}
