<?php

namespace Tests\Unit;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PermissionModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_permission_model_creates_record()
    {
        // Act
        $permission = Permission::create([
            'value' => 'manage_users',
        ]);

        // Assert: record exists in DB
        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'value' => 'manage_users',
        ]);
    }

    public function test_permission_model_uses_fillable_fields()
    {
        // Act
        $permission = new Permission([
            'value' => 'edit_products',
            'non_existing_field' => 'ignored',
        ]);

        // Assert: only fillable fields are set
        $this->assertEquals('edit_products', $permission->value);
        $this->assertFalse(isset($permission->non_existing_field));
    }

    public function test_permission_model_has_timestamps()
    {
        // Act
        $permission = Permission::factory()->create();

        // Assert: timestamps exist and are Carbon instances
        $this->assertNotNull($permission->created_at);
        $this->assertNotNull($permission->updated_at);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $permission->created_at);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $permission->updated_at);
    }
}
