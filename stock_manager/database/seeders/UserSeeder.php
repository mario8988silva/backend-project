<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Admin' => 'admin@example.com',
            'Manager' => 'manager@example.com',
            'Staff' => 'staff@example.com',
            'Representative' => 'representative@example.com',
            'Customer' => 'customer@example.com',
        ];

        foreach ($roles as $roleValue => $email) {
            $role = Role::where('value', $roleValue)->first();
            if ($role) {
                User::factory()->create([
                    'name' => $roleValue . ' User',
                    'email' => $email,
                    'password' => bcrypt('password'),
                    'phone' => fake()->phoneNumber(),
                    'role_id' => $role->id,
                ]);
            }
        }
    }
}
