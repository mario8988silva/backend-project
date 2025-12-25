<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IvaCategory>
 */

class IvaCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {// Common Portuguese IVA categories
        $ivaRates = [
            ['name' => 'Standard',     'rate' => 23.00, 'description' => 'Standard VAT rate'],
            ['name' => 'Intermediate', 'rate' => 13.00, 'description' => 'Intermediate VAT rate'],
            ['name' => 'Reduced',      'rate' => 6.00,  'description' => 'Reduced VAT rate'],
            ['name' => 'Exempt',       'rate' => 0.00,  'description' => 'Exempt from VAT'],
        ];

        $choice = $this->faker->randomElement($ivaRates);

        return [
            'name' => $choice['name'],
            'rate' => $choice['rate'],
            'description' => $choice['description'],
        ];
    }
}
