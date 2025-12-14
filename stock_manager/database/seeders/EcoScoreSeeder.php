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
            ['grade' => 'A', 'color' => 'Green',  'description' => 'Excellent sustainability'],
            ['grade' => 'B', 'color' => 'LightGreen', 'description' => 'Good sustainability'],
            ['grade' => 'C', 'color' => 'Yellow', 'description' => 'Moderate sustainability'],
            ['grade' => 'D', 'color' => 'Orange', 'description' => 'Poor sustainability'],
            ['grade' => 'E', 'color' => 'Red',    'description' => 'Very poor sustainability'],
        ];

       foreach ($ecoScores as $ecoScore) {
            EcoScore::create($ecoScore);
        }
    }
}