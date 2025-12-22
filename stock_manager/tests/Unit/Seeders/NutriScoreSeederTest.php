<?php

namespace Tests\Unit\Seeders;

use App\Models\NutriScore;
use Database\Seeders\NutriScoreSeeder;

class NutriScoreSeederTest extends BaseSeederTest
{
    public function test_nutri_score_seeder_populates_table()
    {
        $this->runSeeder(NutriScoreSeeder::class);

        // Seeder inserts exactly 5 NutriScore rows
        $this->assertTableHasRows('nutri_scores', 5);

        $expected = [
            ['grade' => 'A', 'color' => 'Green'],
            ['grade' => 'B', 'color' => 'LightGreen'],
            ['grade' => 'C', 'color' => 'Yellow'],
            ['grade' => 'D', 'color' => 'Orange'],
            ['grade' => 'E', 'color' => 'Red'],
        ];

        foreach ($expected as $row) {
            $this->assertRowExists('nutri_scores', $row);
        }

        // Ensure description is not null for at least one row
        $this->assertColumnsNotNull('nutri_scores', ['description']);
    }
}
