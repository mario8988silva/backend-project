<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Family;

class FamilyModelTest extends BaseModelTest
{
    public function test_family_model_structure()
    {
        $model = new Family();

        $this->assertModelTable($model, 'families');

        $this->assertModelFillable($model, [
            'name',
            'description',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_family_categories_relationship()
    {
        $model = new Family();

        $this->assertInstanceOf(
            Category::class,
            $model->categories()->getRelated(),
            'Family->categories() should return a Category model.'
        );
    }
}
