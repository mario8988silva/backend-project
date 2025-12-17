<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('value', 'Admin')->first();
        $manager = Role::where('value', 'Manager')->first();
        $staff = Role::where('value', 'Staff')->first();
        $retailerRep = Role::where('value', 'Retailer Representative')->first();
        $customer = Role::where('value', 'Customer')->first();


        // Admin gets everything
        if ($admin) {
            $admin->permissions()->sync(Permission::pluck('id')->toArray());
        }

        // Manager gets product, order and stock permissions
        if ($manager) {
            $manager->permissions()->sync(
                Permission::whereIn('value', [
                    'view_products',
                    'edit_products',
                    'delete_products',
                    'view_orders',
                    'edit_orders',
                    'delete_orders',
                    'view_stock',
                    'edit_stock',
                    'delete_stock'
                ])->pluck('id')->toArray()
            );
        }

        // Staff can view products, orders and stock, and edit orders and stock
        if ($staff) {
            $staff->permissions()->sync(
                Permission::whereIn('value', [
                    'view_products',
                    'view_orders',
                    'edit_orders',
                    'view_stock',
                    'edit_stock',
                ])->pluck('id')->toArray()
            );
        }

        // Retailer Representative can view products, orders and stock
        if ($retailerRep) {
            $retailerRep->permissions()->sync(
                Permission::whereIn('value', [
                    'view_products',
                    'view_orders',
                    'view_stock',
                ])->pluck('id')->toArray()
            );
        }

        // Customer can only view stock
        if ($customer) {
            $customer->permissions()->sync(
                Permission::whereIn('value', [
                    'view_stock',
                ])->pluck('id')->toArray()
            );
        }
    }
}
