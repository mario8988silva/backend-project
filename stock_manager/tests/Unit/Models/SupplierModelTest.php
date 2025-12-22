<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Representative;
use App\Models\Supplier;

class SupplierModelTest extends BaseModelTest
{
    public function test_supplier_model_structure()
    {
        $model = new Supplier();

        $this->assertModelTable($model, 'suppliers');

        $this->assertModelFillable($model, [
            'name',
            'phone',
            'email',
            'address',
            'notes',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_supplier_relationships()
    {
        $model = new Supplier();

        // hasMany Representatives
        $this->assertInstanceOf(
            Representative::class,
            $model->representatives()->getRelated()
        );

        // belongsToMany Categories
        $this->assertInstanceOf(
            Category::class,
            $model->categories()->getRelated()
        );

        // hasMany Products
        $this->assertInstanceOf(
            Product::class,
            $model->products()->getRelated()
        );

        // hasMany Invoices
        $this->assertInstanceOf(
            Invoice::class,
            $model->invoices()->getRelated()
        );
    }
}
