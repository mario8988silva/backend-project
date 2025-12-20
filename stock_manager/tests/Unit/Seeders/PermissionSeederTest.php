<?php

namespace Tests\Unit;

use App\Models\Permission;
use Database\Seeders\PermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PermissionSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_permission_seeder_populates_permissions_table()
    {
        // Act: run the seeder
        $this->seed(PermissionSeeder::class);

        // Assert: count matches expected number
        $this->assertEquals(10, Permission::count());

        // Assert: specific permissions exist
        $this->assertDatabaseHas('permissions', ['value' => 'manage_users']);
        $this->assertDatabaseHas('permissions', ['value' => 'view_products']);
        $this->assertDatabaseHas('permissions', ['value' => 'delete_stock']);
    }
}
