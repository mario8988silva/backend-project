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
            'invoice' => strtoupper($this->faker->bothify('INV-#####')),
            'date' => $this->faker->dateTime(),
            'order_id' => Order::inRandomOrder()->first()?->id,
            'retailer_id' => Retailer::inRandomOrder()->first()?->id,
        ];
    }
}
