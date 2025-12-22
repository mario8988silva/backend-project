<?php

namespace Tests\Unit\Migrations;

class NutriScoreMigrationTest extends BaseMigrationTest
{
    public function test_nutri_scores_table_structure()
    {
        $this->assertTableExists('nutri_scores');

        $this->assertTableColumns('nutri_scores', [
            'id',
            'grade',
            'color',
            'description',
            'created_at',
            'updated_at',
        ]);
    }
}
