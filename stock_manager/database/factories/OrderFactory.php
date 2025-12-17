<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Representative;
use App\Models\Status;
use App\Models\Team;
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
            'quantity' => $this->faker->numberBetween(1, 20),
            'product_id' => Product::inRandomOrder()->first()?->id,
            'representative_id' => Representative::inRandomOrder()->first()?->id,
            'team_id' => Team::inRandomOrder()->first()?->id,
            'order_date' => $this->faker->date(),
            'delivery_date' => $this->faker->date(),
            'invoice_id' => Invoice::inRandomOrder()->first()?->id,
            'status_id' => Status::inRandomOrder()->first()?->id,
        ];
    }
}
