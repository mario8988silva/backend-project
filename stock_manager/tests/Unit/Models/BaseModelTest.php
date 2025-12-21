<?php

namespace Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

abstract class BaseModelTest extends TestCase
{
    /**
     * Assert that the model uses the expected table name.
     */
    protected function assertModelTable(Model $model, string $expectedTable)
    {
        $this->assertEquals(
            $expectedTable,
            $model->getTable(),
            "Model [" . get_class($model) . "] should use table [$expectedTable]."
        );
    }

    /**
     * Assert that the model has the expected fillable attributes.
     */
    protected function assertModelFillable(Model $model, array $expectedFillable)
    {
        $this->assertEqualsCanonicalizing(
            $expectedFillable,
            $model->getFillable(),
            "Model [" . get_class($model) . "] fillable attributes do not match."
        );
    }

    /**
     * Assert that the model has the expected casts.
     */
    protected function assertModelCasts(Model $model, array $expectedCasts)
    {
        $this->assertEqualsCanonicalizing(
            $expectedCasts,
            $model->getCasts(),
            "Model [" . get_class($model) . "] casts do not match."
        );
    }

    /**
     * Assert that the model uses timestamps or not.
     */
    protected function assertModelTimestamps(Model $model, bool $expected)
    {
        $this->assertEquals(
            $expected,
            $model->usesTimestamps(),
            "Model [" . get_class($model) . "] timestamp setting does not match."
        );
    }

    /**
     * Assert that the model uses incrementing primary keys.
     */
    protected function assertModelIncrementing(Model $model, bool $expected)
    {
        $this->assertEquals(
            $expected,
            $model->getIncrementing(),
            "Model [" . get_class($model) . "] incrementing setting does not match."
        );
    }

    /**
     * Assert that the model uses the expected primary key.
     */
    protected function assertModelPrimaryKey(Model $model, string $expectedKey)
    {
        $this->assertEquals(
            $expectedKey,
            $model->getKeyName(),
            "Model [" . get_class($model) . "] primary key should be [$expectedKey]."
        );
    }
}
