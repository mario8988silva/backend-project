<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Users
            ['value' => 'manage_users'],

            // Products
            ['value' => 'view_products'],
            ['value' => 'edit_products'],
            ['value' => 'delete_products'],

            // Orders
            ['value' => 'view_orders'],
            ['value' => 'edit_orders'],
            ['value' => 'delete_orders'],

            // Stock
            ['value' => 'view_stock'],
            ['value' => 'edit_stock'],
            ['value' => 'delete_stock'],
        ];

        foreach ($permissions as $perm) {
            Permission::create([
                'value' => $perm['value'],
                'details' => fake()->sentence(),
            ]);
        }
    }
}
