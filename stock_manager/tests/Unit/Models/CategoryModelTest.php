<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use App\Models\Supplier;

class CategoryModelTest extends BaseModelTest
{
    public function test_category_model_structure()
    {
        $model = new Category();

        $this->assertModelTable($model, 'categories');

        $this->assertModelFillable($model, [
            'family_id',
            'name',
            'description',
        ]);
    }

    public function test_category_relationships()
    {
        $model = new Category();

        $this->assertInstanceOf(Family::class, $model->family()->getRelated());
        $this->assertInstanceOf(Subcategory::class, $model->subcategories()->getRelated());
        $this->assertInstanceOf(Supplier::class, $model->suppliers()->getRelated());
    }
}
