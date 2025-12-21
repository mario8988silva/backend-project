<?php

namespace Tests\Unit\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class UserSeederTest extends BaseSeederTest
{
    public function test_user_seeder_creates_expected_users()
    {
        // Seed roles first (UserSeeder depends on them)
        $this->runSeeder(RoleSeeder::class);

        // Run the UserSeeder
        $this->runSeeder(UserSeeder::class);

        // Should create exactly 5 users (one per role)
        $this->assertTableHasRows('users', 5);

        // Expected users
        $expectedUsers = [
            ['email' => 'admin@example.com', 'name' => 'Admin User'],
            ['email' => 'manager@example.com', 'name' => 'Manager User'],
            ['email' => 'staff@example.com', 'name' => 'Staff User'],
            ['email' => 'representative@example.com', 'name' => 'Supplier Representative User'],
            ['email' => 'customer@example.com', 'name' => 'Customer User'],
        ];

        foreach ($expectedUsers as $user) {
            $this->assertRowExists('users', [
                'email' => $user['email'],
                'name'  => $user['name'],
            ]);
        }

        // Ensure phone and password are not null
        $this->assertColumnsNotNull('users', [
            'phone',
            'password',
        ]);

        // Ensure each user has a valid role_id
        foreach (User::all() as $user) {
            $this->assertNotNull(
                $user->role_id,
                "User [{$user->email}] does not have a role_id assigned."
            );

            $this->assertNotNull(
                Role::find($user->role_id),
                "User [{$user->email}] has an invalid role_id."
            );
        }
    }
}
