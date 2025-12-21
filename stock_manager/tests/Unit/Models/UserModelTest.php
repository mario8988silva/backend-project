<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use App\Models\User;

class UserModelTest extends BaseModelTest
{
    public function test_user_model_structure()
    {
        $model = new User();

        $this->assertModelTable($model, 'users');

        $this->assertModelFillable($model, [
            'name',
            'email',
            'password',
            'phone',
            'role_id',
        ]);

        $this->assertModelCasts($model, [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'id' => 'int',
        ]);


        $this->assertModelTimestamps($model, true);
        $this->assertModelIncrementing($model, true);
        $this->assertModelPrimaryKey($model, 'id');
    }

    public function test_user_role_relationship()
    {
        $model = new User();

        $this->assertInstanceOf(
            Role::class,
            $model->role()->getRelated(),
            'User->role() should return a Role model.'
        );
    }

    public function test_user_permissions_accessor_returns_collection()
    {
        $user = new User();

        $this->assertTrue(
            method_exists($user, 'permissions'),
            'User model should have a permissions() method.'
        );

        $this->assertTrue(
            $user->permissions() instanceof \Illuminate\Support\Collection,
            'User->permissions() should return a Collection.'
        );
    }
}
