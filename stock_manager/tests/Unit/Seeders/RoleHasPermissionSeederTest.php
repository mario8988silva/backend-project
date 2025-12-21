<?php

namespace Tests\Unit\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoleHasPermissionSeeder;

class RoleHasPermissionSeederTest extends BaseSeederTest
{
    public function test_role_has_permission_seeder_assigns_permissions_correctly()
    {
        // Seed roles and permissions first
        $this->runSeeder(RoleSeeder::class);
        $this->runSeeder(PermissionSeeder::class);

        // Now seed the pivot table
        $this->runSeeder(RoleHasPermissionSeeder::class);

        // Fetch roles
        $admin = Role::where('value', 'Admin')->first();
        $manager = Role::where('value', 'Manager')->first();
        $staff = Role::where('value', 'Staff')->first();
        $supplierRep = Role::where('value', 'Supplier Representative')->first();
        $customer = Role::where('value', 'Customer')->first();

        // Admin should have ALL permissions
        $this->assertEquals(
            Permission::count(),
            $admin->permissions()->count(),
            'Admin should have all permissions.'
        );

        // Manager expected permissions
        $managerExpected = [
            'view_products', 'edit_products', 'delete_products',
            'view_orders', 'edit_orders', 'delete_orders',
            'view_stock', 'edit_stock', 'delete_stock',
        ];

        $this->assertEqualsCanonicalizing(
            Permission::whereIn('value', $managerExpected)->pluck('id')->toArray(),
            $manager->permissions()->pluck('id')->toArray(),
            'Manager permissions do not match expected.'
        );

        // Staff expected permissions
        $staffExpected = [
            'view_products',
            'view_orders', 'edit_orders',
            'view_stock', 'edit_stock',
        ];

        $this->assertEqualsCanonicalizing(
            Permission::whereIn('value', $staffExpected)->pluck('id')->toArray(),
            $staff->permissions()->pluck('id')->toArray(),
            'Staff permissions do not match expected.'
        );

        // Supplier Representative expected permissions
        $supplierExpected = [
            'view_products',
            'view_orders',
            'view_stock',
        ];

        $this->assertEqualsCanonicalizing(
            Permission::whereIn('value', $supplierExpected)->pluck('id')->toArray(),
            $supplierRep->permissions()->pluck('id')->toArray(),
            'Supplier Representative permissions do not match expected.'
        );

        // Customer expected permissions
        $customerExpected = ['view_stock'];

        $this->assertEqualsCanonicalizing(
            Permission::whereIn('value', $customerExpected)->pluck('id')->toArray(),
            $customer->permissions()->pluck('id')->toArray(),
            'Customer permissions do not match expected.'
        );
    }
}
