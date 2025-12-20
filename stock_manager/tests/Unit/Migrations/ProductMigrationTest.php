<?php

namespace Tests\Unit\Migrations;

use Tests\Unit\Migrations\BaseMigrationTest;

class ProductMigrationTest extends BaseMigrationTest
{
    public function test_products_table_structure()
    {
        $this->assertTableExists('products');

        $this->assertTableColumns('products', [
            'id',
            'barcode',
            'name',
            'image',
            'description',

            // Foreign keys
            'unit_type_id',
            'iva_category_id',
            'brand_id',
            'subcategory_id',
            'nutri_score_id',
            'eco_score_id',

            // Attributes
            'sugar_free',
            'gluten_free',
            'lactose_free',
            'vegan',
            'vegetarian',
            'organic',

            // Timestamps
            'created_at',
            'updated_at',
        ]);
    }
}
