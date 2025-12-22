<?php

namespace Tests\Unit\Models;

use App\Models\EcoScore;
use App\Models\Product;

class EcoScoreModelTest extends BaseModelTest
{
    public function test_eco_score_model_structure()
    {
        $model = new EcoScore();

        $this->assertModelTable($model, 'eco_scores');

        $this->assertModelFillable($model, [
            'grade',
            'color',
            'description',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_eco_score_products_relationship()
    {
        $model = new EcoScore();

        $this->assertInstanceOf(
            Product::class,
            $model->products()->getRelated(),
            'EcoScore->products() should return a Product model.'
        );
    }
}
