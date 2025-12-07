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
        NutriScore::factory()->count(5)->create();
    }
}
