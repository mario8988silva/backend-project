<?php

namespace Tests\Unit\Factories;

use App\Models\Role;
use App\Models\User;

class UserFactoryTest extends BaseFactoryTest
{
    public function test_user_factory_creates_user()
    {
        // Ensure roles exist so the factory can assign role_id
        Role::factory()->create();

        $this->assertFactoryCreates(User::class);
    }

    public function test_user_factory_makes_user()
    {
        Role::factory()->create();

        $this->assertFactoryMakes(User::class);
    }

    public function test_user_factory_assigns_role_id_when_roles_exist()
    {
        $role = Role::factory()->create();

        $user = User::factory()->create();

        $this->assertEquals(
            $role->id,
            $user->role_id,
            'UserFactory did not assign a valid role_id.'
        );
    }

    public function test_user_factory_unverified_state()
    {
        Role::factory()->create();

        $user = User::factory()->unverified()->create();

        $this->assertNull(
            $user->email_verified_at,
            'UserFactory unverified() state did not set email_verified_at to null.'
        );
    }
}
