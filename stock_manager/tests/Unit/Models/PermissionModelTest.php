<?php

namespace Tests\Unit;

use App\Models\Permission;
use App\Models\Role;
use Tests\Unit\Models\BaseModelTest;

class PermissionModelTest extends BaseModelTest
{


    public function test_permission_model_structure()
    {
        $model = new Permission();

        $this->assertModelTable($model, 'permissions');

        $this->assertModelFillable($model, [
            'value',
            'details',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_permission_roles_relationship()
    {
        $model = new Permission();

        $this->assertEquals(
            'role_has_permissions',
            $model->roles()->getTable()
        );

        $this->assertInstanceOf(Role::class, $model->roles()->getRelated());
    }
}