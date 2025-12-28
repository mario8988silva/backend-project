<?php

namespace Tests\Unit\Seeders;

use App\Models\EcoScore;
use Database\Seeders\EcoScoreSeeder;

class EcoScoreSeederTest extends BaseSeederTest
{
    public function test_eco_score_seeder_populates_table()
    {
        $this->runSeeder(EcoScoreSeeder::class);

        // Seeder inserts exactly 5 EcoScore rows
        $this->assertTableHasRows('eco_scores', 5);

        $expected = [
            ['name' => 'A', 'color' => 'Green'],
            ['name' => 'B', 'color' => 'LightGreen'],
            ['name' => 'C', 'color' => 'Yellow'],
            ['name' => 'D', 'color' => 'Orange'],
            ['name' => 'E', 'color' => 'Red'],
        ];

        foreach ($expected as $row) {
            $this->assertRowExists('eco_scores', $row);
        }

        // Ensure description is not null for at least one row
        $this->assertColumnsNotNull('eco_scores', ['description']);
    }
}
