<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class EcoScoresMigrationTest extends BaseMigrationTest
{
    public function test_eco_scores_table_structure()
    {
        $this->assertTableExists('eco_scores');

        $this->assertTableColumns('eco_scores', [
            'id',
            'grade',
            'color',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
