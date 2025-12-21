<?php

namespace Tests\Unit\Models;

use App\Models\RoleHasPermission;
use App\Models\Role;
use App\Models\Permission;

class RoleHasPermissionModelTest extends BaseModelTest
{
    public function test_role_has_permission_model_structure()
    {
        $model = new RoleHasPermission();

        $this->assertModelTable($model, 'role_has_permissions');

        $this->assertModelFillable($model, [
            'role_id',
            'permission_id',
        ]);

        $this->assertModelTimestamps($model, false);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_role_relationship()
    {
        $model = new RoleHasPermission();

        $this->assertInstanceOf(Role::class, $model->role()->getRelated());
    }

    public function test_permission_relationship()
    {
        $model = new RoleHasPermission();

        $this->assertInstanceOf(Permission::class, $model->permission()->getRelated());
    }
}
