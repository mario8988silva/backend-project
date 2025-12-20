<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    protected $fillable = ['value'];

    // Example relationship: many-to-many with roles

    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
}
