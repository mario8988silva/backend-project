<?php

namespace Database\Factories;

use App\Models\Permission;
use App\Models\Role;
use Database\Factories\Concerns\PicksExistingOrNull;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoleHasPermission>
 */
class RoleHasPermissionFactory extends Factory
{
    use PicksExistingOrNull;

    public function definition(): array
    {
        return [
            'role_id' => $this->randomExistingOrNull(Role::class),
            'permission_id' => $this->randomExistingOrNull(Permission::class),
        ];
    }
}
