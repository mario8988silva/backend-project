<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\BaseDatabaseTest;

class CategoryTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_category_table_can_be_exported()
    {
        $this->assertTableHasData(Category::class);
        $this->showTableDetails(Category::class);   // prints sample rows
        $this->assertFactoryCreates(Category::class); // confirms factory works
    }
}
