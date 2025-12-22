<?php

namespace Database\Factories;

use App\Models\Representative;
use App\Models\Supplier;
use Database\Factories\Concerns\PicksExistingOrNull;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Representative>
 */
class RepresentativeFactory extends Factory
{
    use PicksExistingOrNull;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'notes' => $this->faker->sentence(),
            'supplier_id' => $this->randomExistingOrNull(Supplier::class),
        ];
    }
}
