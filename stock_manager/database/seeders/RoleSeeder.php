<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Manager',
            'Staff',
            'Supplier Representative',
            'Customer',
        ];

        foreach ($roles as $role) {
            Role::create([
                'value' => $role,
                'details' => fake()->sentence(),   // random description
            ]);
        }
    }
}
