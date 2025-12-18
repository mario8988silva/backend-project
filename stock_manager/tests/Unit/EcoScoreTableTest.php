<?php

namespace Tests\Unit;

use App\Models\EcoScore;
use Tests\BaseDatabaseTest;

class EcoScoreTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_eco_score_can_be_exported()
    {
        $this->assertTableHasData(EcoScore::class);
        $this->showTableDetails(EcoScore::class);   // prints sample rows
        $this->assertFactoryCreates(EcoScore::class); // confirms factory works
    }
}
