<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\CategoryHasSupplier;
use App\Models\Supplier;

class CategoryHasSupplierModelTest extends BaseModelTest
{
    public function test_category_has_supplier_model_structure()
    {
        $model = new CategoryHasSupplier();

        $this->assertModelTable($model, 'category_has_suppliers');

        $this->assertModelFillable($model, [
            'category_id',
            'supplier_id',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_category_has_supplier_relationships()
    {
        $model = new CategoryHasSupplier();

        $this->assertInstanceOf(Category::class, $model->category()->getRelated());
        $this->assertInstanceOf(Supplier::class, $model->supplier()->getRelated());
    }
}
