<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        return [
            'invoice' => $this->faker->unique()->numerify('INV-#####'),
            'date' => $this->faker->dateTimeThisYear(),
            'order_id' => Order::factory(),
            'retailer_id' => Retailer::factory(),
        ];
    }
}
