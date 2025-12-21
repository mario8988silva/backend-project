<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RoleModelTest extends BaseModelTest
{
    public function test_role_model_structure()
    {
        $model = new Role();

        $this->assertModelTable($model, 'roles');

        $this->assertModelFillable($model, [
            'value',
            'details',
        ]);

        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_role_permissions_relationship()
    {
        $model = new Role();

        $this->assertEquals(
            'role_has_permissions',
            $model->permissions()->getTable()
        );

        $this->assertInstanceOf(Permission::class, $model->permissions()->getRelated());
    }

    public function test_role_users_relationship()
    {
        $model = new Role();

        $this->assertEquals(
            'user_has_roles',
            $model->users()->getTable()
        );

        $this->assertInstanceOf(User::class, $model->users()->getRelated());
    }
}