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
            ['grade' => 'A', 'color' => 'Green',  'description' => 'Excellent sustainability'],
            ['grade' => 'B', 'color' => 'LightGreen', 'description' => 'Good sustainability'],
            ['grade' => 'C', 'color' => 'Yellow', 'description' => 'Moderate sustainability'],
            ['grade' => 'D', 'color' => 'Orange', 'description' => 'Poor sustainability'],
            ['grade' => 'E', 'color' => 'Red',    'description' => 'Very poor sustainability'],
        ];

        // Pick one at random
        $choice = $this->faker->randomElement($grades);

        return [
            'grade' => $choice['grade'],
            'color' => $choice['color'],
            'description' => $choice['description'],
        ];
    }
}
