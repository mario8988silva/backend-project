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
            ['name' => 'A', 'color' => 'Green',      'description' => 'Excellent nutritional quality'],
            ['name' => 'B', 'color' => 'LightGreen', 'description' => 'Good nutritional quality'],
            ['name' => 'C', 'color' => 'Yellow',     'description' => 'Moderate nutritional quality'],
            ['name' => 'D', 'color' => 'Orange',     'description' => 'Poor nutritional quality'],
            ['name' => 'E', 'color' => 'Red',        'description' => 'Very poor nutritional quality'],
        ];

        foreach ($nutriScores as $nutriScore) {
            NutriScore::create($nutriScore);
        }
    }
}