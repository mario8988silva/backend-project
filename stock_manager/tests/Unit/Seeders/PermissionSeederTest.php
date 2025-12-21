<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\PermissionSeeder;

class PermissionSeederTest extends BaseSeederTest
{
    public function test_permission_seeder_populates_table()
    {
        $this->runSeeder(PermissionSeeder::class);

        // Should have at least 10 permissions
        $this->assertTableHasRows('permissions', 10);

        // Check a few known permissions
        $this->assertRowExists('permissions', ['value' => 'manage_users']);
        $this->assertRowExists('permissions', ['value' => 'view_products']);
        $this->assertRowExists('permissions', ['value' => 'delete_stock']);

        // Ensure details column is populated
        $this->assertColumnsNotNull('permissions', ['details']);
    }
}
