<?php

namespace Database\Seeders;

use App\Models\NutriScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NutriScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nutriScores = [
            ['grade' => 'A', 'color' => 'Green',      'description' => 'Excellent nutritional quality'],
            ['grade' => 'B', 'color' => 'LightGreen', 'description' => 'Good nutritional quality'],
            ['grade' => 'C', 'color' => 'Yellow',     'description' => 'Moderate nutritional quality'],
            ['grade' => 'D', 'color' => 'Orange',     'description' => 'Poor nutritional quality'],
            ['grade' => 'E', 'color' => 'Red',        'description' => 'Very poor nutritional quality'],
        ];

        foreach ($nutriScores as $nutriScore) {
            NutriScore::create($nutriScore);
        }
    }
}