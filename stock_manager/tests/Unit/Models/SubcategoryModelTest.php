<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

class SubcategoryModelTest extends BaseModelTest
{
    public function test_subcategory_model_structure()
    {
        $model = new Subcategory();

        $this->assertModelTable($model, 'subcategories');

        $this->assertModelFillable($model, [
            'category_id',
            'name',
            'description',
        ]);
    }

    public function test_subcategory_relationships()
    {
        $model = new Subcategory();

        $this->assertInstanceOf(Category::class, $model->category()->getRelated());
        $this->assertInstanceOf(Product::class, $model->products()->getRelated());
    }
}
