<?php

namespace Tests\Unit\Models;

use App\Models\NutriScore;
use App\Models\Product;

class NutriScoreModelTest extends BaseModelTest
{
    public function test_nutri_score_model_structure()
    {
        $model = new NutriScore();

        $this->assertModelTable($model, 'nutri_scores');

        $this->assertModelFillable($model, [
            'name',
            'color',
            'description',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_nutri_score_products_relationship()
    {
        $model = new NutriScore();

        $this->assertInstanceOf(
            Product::class,
            $model->products()->getRelated(),
            'NutriScore->products() should return a Product model.'
        );
    }
}
