<?php

namespace Tests\Unit\Factories;

use App\Models\Supplier;

class SupplierFactoryTest extends BaseFactoryTest
{
    public function test_supplier_factory_creates()
    {
        $this->assertFactoryCreates(Supplier::class);
    }

    public function test_supplier_factory_makes()
    {
        $this->assertFactoryMakes(Supplier::class);
    }

    public function test_supplier_factory_generates_valid_attributes()
    {
        $instance = Supplier::factory()->make();

        $this->assertNotEmpty($instance->name);
        $this->assertNotEmpty($instance->phone);
        $this->assertNotEmpty($instance->email);
        $this->assertNotEmpty($instance->address);
    }
}
