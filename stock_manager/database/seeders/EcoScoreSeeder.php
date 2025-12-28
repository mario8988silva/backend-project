<?php

namespace Database\Seeders;

use App\Models\EcoScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcoScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define fixed grades/colors mapping
        $ecoScores = [
            ['name' => 'A', 'color' => 'Green',  'description' => 'Excellent sustainability'],
            ['name' => 'B', 'color' => 'LightGreen', 'description' => 'Good sustainability'],
            ['name' => 'C', 'color' => 'Yellow', 'description' => 'Moderate sustainability'],
            ['name' => 'D', 'color' => 'Orange', 'description' => 'Poor sustainability'],
            ['name' => 'E', 'color' => 'Red',    'description' => 'Very poor sustainability'],
        ];

       foreach ($ecoScores as $ecoScore) {
            EcoScore::create($ecoScore);
        }
    }
}