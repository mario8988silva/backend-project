<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\Concerns\PicksExistingOrNull;

use App\Models\Order;
use App\Models\Supplier;
/*
class InvoiceFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'number'       => strtoupper($this->faker->bothify('INV-#####')),
            'issue_date'   => $this->faker->dateTime(),
            'due_date'     => $this->faker->dateTimeBetween('now', '+1 month'),
            'order_id'     => $this->randomExistingOrNull(Order::class),
            'supplier_id'  => $this->randomExistingOrNull(Supplier::class),
            'total_amount' => $this->faker->randomFloat(2, 10, 500),
            'currency'     => 'EUR',
            'notes'        => $this->faker->sentence(),
        ];
    }
}
*/
