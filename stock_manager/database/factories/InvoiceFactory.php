<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        return [
            'number'       => strtoupper($this->faker->bothify('INV-#####')),
            'issue_date'   => $this->faker->dateTime(),
            'due_date'     => $this->faker->dateTimeBetween('now', '+1 month'),
            'order_id'     => Order::inRandomOrder()->first()?->id,
            'supplier_id'  => Supplier::inRandomOrder()->first()?->id,
            'total_amount' => $this->faker->randomFloat(2, 10, 500),
            'currency'     => 'EUR',
            'notes'        => $this->faker->sentence(),
        ];
    }
}
