<?php

namespace Tests\Unit\Seeders;

use Database\Seeders\RoleSeeder;

class RoleSeederTest extends BaseSeederTest
{
    public function test_role_seeder_populates_table()
    {
        $this->runSeeder(RoleSeeder::class);

        // Should have at least 5 roles
        $this->assertTableHasRows('roles', 5);

        // Check specific roles
        $this->assertRowExists('roles', ['value' => 'Admin']);
        $this->assertRowExists('roles', ['value' => 'Manager']);
        $this->assertRowExists('roles', ['value' => 'Supplier Representative']);
        $this->assertRowExists('roles', ['value' => 'Customer']);

        // Ensure details column is populated
        $this->assertColumnsNotNull('roles', ['details']);
    }
}
