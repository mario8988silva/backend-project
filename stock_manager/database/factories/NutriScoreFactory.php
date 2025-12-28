<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NutriScore>
 */

class NutriScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define fixed NutriScore grades/colors mapping
        $grades = [
            ['name' => 'A', 'color' => 'Green',      'description' => 'Excellent nutritional quality'],
            ['name' => 'B', 'color' => 'LightGreen', 'description' => 'Good nutritional quality'],
            ['name' => 'C', 'color' => 'Yellow',     'description' => 'Moderate nutritional quality'],
            ['name' => 'D', 'color' => 'Orange',     'description' => 'Poor nutritional quality'],
            ['name' => 'E', 'color' => 'Red',        'description' => 'Very poor nutritional quality'],
        ];

        $choice = $this->faker->randomElement($grades);

        return [
            'name' => $choice['name'],
            'color' => $choice['color'],
            'description' => $choice['description'],
        ];
    }
}
