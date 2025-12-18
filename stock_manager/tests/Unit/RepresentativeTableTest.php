<?php

namespace Tests\Unit;

use App\Models\Representative;
use Tests\BaseDatabaseTest;

class RepresentativeTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_representative_table_can_be_exported()
    {
        $this->assertTableHasData(Representative::class);
        $this->showTableDetails(Representative::class);   // prints sample rows
        $this->assertFactoryCreates(Representative::class); // confirms factory works
    }
}
