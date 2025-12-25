<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\WasteLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\Concerns\PicksExistingOrNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WasteLog>
 */


class WasteLogFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 10),
            'logged_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'notes' => $this->faker->sentence(),

            'product_id' => Product::inRandomOrder()->first()?->id
                ?? Product::factory()->create()->id,
            'status_id' => $this->randomExistingOrNull(Status::class),
            'order_id' => $this->randomExistingOrNull(Order::class),

        ];
    }
}
