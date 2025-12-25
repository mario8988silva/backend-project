<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\OrderHasProduct;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\Concerns\PicksExistingOrNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(0, 100),

            'product_id' => Product::factory(),
            'order_has_product_id' => $this->randomExistingOrNull(OrderHasProduct::class),
            'status_id' => $this->randomExistingOrNull(Status::class),
            'location_id' => $this->randomExistingOrNull(Location::class),
        ];
    }
}
