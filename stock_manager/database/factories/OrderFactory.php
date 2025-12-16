<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 100),
            'product_id' => Product::factory(),
            'representative_id' => Representative::factory(),
            'team_id' => Team::factory(),
            'order_date' => $this->faker->date(),
            'delivery_date' => $this->faker->date(),
            'invoice_id' => Invoice::factory(),
            'product_status_id' => Status::factory(),
        ];
    }
}
