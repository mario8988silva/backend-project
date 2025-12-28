<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EcoScore>
 */

class EcoScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define fixed grades/colors mapping
        $grades = [
            ['name' => 'A', 'color' => 'Green',  'description' => 'Excellent sustainability'],
            ['name' => 'B', 'color' => 'LightGreen', 'description' => 'Good sustainability'],
            ['name' => 'C', 'color' => 'Yellow', 'description' => 'Moderate sustainability'],
            ['name' => 'D', 'color' => 'Orange', 'description' => 'Poor sustainability'],
            ['name' => 'E', 'color' => 'Red',    'description' => 'Very poor sustainability'],
        ];

        // Pick one at random
        $choice = $this->faker->randomElement($grades);

        return [
            'name' => $choice['name'],
            'color' => $choice['color'],
            'description' => $choice['description'],
        ];
    }
}
