<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\unit_type>
 */
class UnitTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $units = [
            ['name' => 'Unit',     'symbol' => 'u',  'description' => 'Single item'],
            ['name' => 'Gram',     'symbol' => 'g',  'description' => 'Weight in grams'],
            ['name' => 'Kilogram', 'symbol' => 'kg', 'description' => 'Weight in kilograms'],
            ['name' => 'Liter',    'symbol' => 'L',  'description' => 'Volume in liters'],
            ['name' => 'Milliliter','symbol' => 'mL','description' => 'Volume in milliliters'],
            ['name' => 'Meter',    'symbol' => 'm',  'description' => 'Length in meters'],
            ['name' => 'Square Meter','symbol' => 'm²','description' => 'Area in square meters'],
            ['name' => 'Cubic Meter','symbol' => 'm³','description' => 'Volume in cubic meters'],
        ];

        $choice = $this->faker->randomElement($units);

        return [
            'name' => $choice['name'],
            'symbol' => $choice['symbol'],
            'description' => $choice['description'],
        ];
    }
}
