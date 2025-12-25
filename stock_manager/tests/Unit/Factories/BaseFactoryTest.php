<?php

namespace Tests\Unit\Factories;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class BaseFactoryTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();

        // Seed minimal required data
    }


    /**
     * Assert that a factory can create a valid model instance.
     */
    protected function assertFactoryCreates(string $modelClass)
    {
        $instance = $modelClass::factory()->create();

        $this->assertNotNull(
            $instance->id,
            "$modelClass factory failed to create a record."
        );

        $this->assertDatabaseHas(
            $instance->getTable(),
            ['id' => $instance->id]
        );
    }

    /**
     * Assert that a factory can make (not persist) a model instance.
     */
    protected function assertFactoryMakes(string $modelClass)
    {
        $instance = $modelClass::factory()->make();

        $this->assertNull(
            $instance->id,
            "$modelClass::make() should not persist the model."
        );

        $this->assertNotEmpty(
            $instance->toArray(),
            "$modelClass::make() did not generate attributes."
        );
    }
}
