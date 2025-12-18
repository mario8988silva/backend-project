<?php

namespace Tests\Unit;

use App\Models\Team;
use Tests\BaseDatabaseTest;

class TeamTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_team_table_can_be_exported()
    {
        $this->assertTableHasData(Team::class);
    }
}
