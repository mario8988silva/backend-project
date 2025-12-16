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
            'product_id' => Product::factory(),
            'product_subcategory_id' => 1, // adjust if you seed subcategories
            'quantity' => $this->faker->numberBetween(1, 50),
            'date' => $this->faker->dateTimeThisYear(),
            'status_id' => Status::factory(),
            'order_id' => Order::factory(),
        ];
    }
}
