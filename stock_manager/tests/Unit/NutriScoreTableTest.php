<?php

namespace Tests\Unit;

use App\Models\NutriScore;
use Tests\BaseDatabaseTest;

class NutriScoreTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_nutri_score_table_can_be_exported()
    {
        $this->assertTableHasData(NutriScore::class);
        $this->showTableDetails(NutriScore::class);   // prints sample rows
        $this->assertFactoryCreates(NutriScore::class); // confirms factory works
    }
}
