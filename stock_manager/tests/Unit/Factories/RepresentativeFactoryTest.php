<?php

namespace Tests\Unit\Factories;

use App\Models\Representative;
use App\Models\Supplier;

class RepresentativeFactoryTest extends BaseFactoryTest
{
    public function test_representative_factory_creates()
    {
        Supplier::factory()->create(); // ensure FK exists
        $this->assertFactoryCreates(Representative::class);
    }

    public function test_representative_factory_makes()
    {
        Supplier::factory()->create();
        $this->assertFactoryMakes(Representative::class);
    }

    public function test_representative_factory_supplier_id_may_be_null_or_existing()
    {
        Supplier::factory()->count(3)->create();

        $instance = Representative::factory()->make();

        $this->assertTrue(
            $instance->supplier_id === null ||
                Supplier::where('id', $instance->supplier_id)->exists()
        );
    }
}
