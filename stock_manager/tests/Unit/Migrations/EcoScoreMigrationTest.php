<?php

namespace Tests\Unit\Migrations;

class EcoScoreMigrationTest extends BaseMigrationTest
{
    public function test_eco_scores_table_structure()
    {
        $this->assertTableExists('eco_scores');

        $this->assertTableColumns('eco_scores', [
            'id',
            'name',
            'color',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
