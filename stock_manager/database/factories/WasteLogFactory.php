<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\WasteLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WasteLog>
 */
class WasteLogFactory extends Factory
{
    protected $model = WasteLog::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->first()?->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'logged_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status_id' => Status::inRandomOrder()->first()?->id,
            'order_id' => Order::inRandomOrder()->first()?->id,
            'notes' => $this->faker->sentence(),
        ];
    }
}
