<?php

namespace Tests\Unit\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryHasSupplier;
use App\Models\EcoScore;
use App\Models\Family;
use App\Models\IvaCategory;
use App\Models\Location;
use App\Models\NutriScore;
use App\Models\Order;
use App\Models\OrderHasProduct;
use App\Models\Permission;
use App\Models\RoleHasPermission;
use App\Models\SoldProduct;
use App\Models\Status;
use App\Models\Stock;
use App\Models\StockMovement;
use App\Models\Subcategory;
use App\Models\Supplier;
use App\Models\Team;
use App\Models\UnitType;
use App\Models\WasteLog;
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
        
        // Brand::factory()->create();
        // Category::factory()->create();
        /// CategoryHasSupplier::factory()->create();
        // EcoScore::factory()->create();
        /// Family::factory()->create();
        // IvaCategory::factory()->create();
        // Location::factory()->create();
        // NutriScore::factory()->create();
        /// Order::factory()->create();
        /// OrderHasProduct::factory()->create();
        // Permission::factory()->create();
        /// RoleHasPermission::factory()->create();
        /// SoldProduct::factory()->create();
        // Status::factory()->create();
        // Stock::factory()->create();
        // StockMovement::factory()->create();
        // Subcategory::factory()->create();
        // Supplier::factory()->create();
        // Team::factory()->create();
        // UnitType::factory()->create();
        // User::factory()->create();
        // WasteLog::factory()->create();
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
