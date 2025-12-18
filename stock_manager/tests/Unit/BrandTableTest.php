<?php

namespace Tests\Unit;

use App\Models\Brand;
use Tests\BaseDatabaseTest;

class BrandTableTest
extends BaseDatabaseTest
{
    /** @test */
    public function test_brand_table_can_be_exported()
    {
        $this->assertTableHasData(Brand::class);
        $this->showTableDetails(Brand::class);   // prints sample rows
        $this->assertFactoryCreates(Brand::class); // confirms factory works
    }
}
