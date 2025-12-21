<?php

namespace Tests\Unit\Factories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleHasPermission;

class RoleHasPermissionFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_factory_creates_record()
    {
        // Prepare required foreign keys
        $role = Role::factory()->create();
        $permission = Permission::factory()->create();

        // Create pivot record
        $pivot = RoleHasPermission::factory()->create();

        // Assert the pivot exists
        $this->assertDatabaseHas('role_has_permissions', [
            'role_id' => $pivot->role_id,
            'permission_id' => $pivot->permission_id,
        ]);
    }
}
