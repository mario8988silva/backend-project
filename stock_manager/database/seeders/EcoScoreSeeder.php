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
        EcoScore::factory()->count(5)->create();
    }
}
