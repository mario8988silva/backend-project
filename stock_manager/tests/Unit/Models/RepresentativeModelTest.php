<?php

namespace Tests\Unit\Models;

use App\Models\Representative;
use App\Models\Supplier;

class RepresentativeModelTest extends BaseModelTest
{
    public function test_representative_model_structure()
    {
        $model = new Representative();

        $this->assertModelTable($model, 'representatives');

        $this->assertModelFillable($model, [
            'name',
            'phone',
            'email',
            'supplier_id',
            'notes',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_representative_relationships()
    {
        $model = new Representative();

        $this->assertInstanceOf(
            Supplier::class,
            $model->supplier()->getRelated()
        );
    }
}
