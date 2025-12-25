<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'supplier_id' => $this->randomExistingOrNull(Supplier::class),
            'name' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
            'address' => $this->faker->address,
            'notes' => $this->faker->sentence,
        ];
    }
}
