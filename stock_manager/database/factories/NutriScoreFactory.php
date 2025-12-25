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
            ['grade' => 'A', 'color' => 'Green',      'description' => 'Excellent nutritional quality'],
            ['grade' => 'B', 'color' => 'LightGreen', 'description' => 'Good nutritional quality'],
            ['grade' => 'C', 'color' => 'Yellow',     'description' => 'Moderate nutritional quality'],
            ['grade' => 'D', 'color' => 'Orange',     'description' => 'Poor nutritional quality'],
            ['grade' => 'E', 'color' => 'Red',        'description' => 'Very poor nutritional quality'],
        ];

        $choice = $this->faker->randomElement($grades);

        return [
            'grade' => $choice['grade'],
            'color' => $choice['color'],
            'description' => $choice['description'],
        ];
    }
}
