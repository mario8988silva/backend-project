<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\BaseDatabaseTest;

class ProductTableTest extends BaseDatabaseTest
{
    /** @test */
    public function test_product_table_can_be_exported()
    {
        $this->assertTableHasData(Product::class);
        $this->showTableDetails(Product::class);   // prints sample rows
        $this->assertFactoryCreates(Product::class); // confirms factory works
    }
}
