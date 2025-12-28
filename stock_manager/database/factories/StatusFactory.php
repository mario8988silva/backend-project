<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    protected $model = Status::class;

    public function definition(): array
    {
        $statuses = [
            'ORDER',
            'ORDER PENDING',
            'ORDER MADE',
            'SUPPLIER',
            'ARRIVAL',
            'ARRIVAL CHECK',
            'ORDER CHECK',
            'ORDER CLOSED',
            'IN STOCK',
            'STORED',
            'SOLD',
            'REMOVED FROM STOCK',
            'DAMAGED',
            'EXPIRED',
            'BROKEN',
            'LOST',
            'REMOVED FROM CATALOG',
        ];

        return [
            'state' => $this->faker->randomElement($statuses),
            'description' => $this->faker->sentence(),
        ];
    }
}
