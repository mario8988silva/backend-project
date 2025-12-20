<?php

namespace Tests\Unit\Factories;

use App\Models\Invoice;

class InvoiceFactoryTest extends BaseFactoryTest
{
    public function test_factory_creates_record()
    {
        $this->assertFactoryCreates(Invoice::class);
    }

    public function test_factory_makes_record()
    {
        $this->assertFactoryMakes(Invoice::class);
    }
}
