<?php

namespace Tests\Unit\Models;

use App\Models\Location;
use App\Models\Stock;

class LocationModelTest extends BaseModelTest
{
    public function test_location_model_structure()
    {
        $model = new Location();

        $this->assertModelTable($model, 'locations');

        $this->assertModelFillable($model, [
            'name',
            'address',
            'type',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_location_relationships()
    {
        $model = new Location();

        $this->assertInstanceOf(
            Stock::class,
            $model->stocks()->getRelated()
        );
    }
}
