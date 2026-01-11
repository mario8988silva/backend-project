<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasIndexHeaders;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasIndexHeaders;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permissions()
    {
        return $this->role ? $this->role->permissions : collect();
    }

    // -----------------------------------------
    public static function searchable(): array
    {
        return [
            'name',
            'email',
            'phone',
            'role.name',
        ];
    }

    // -----------------------------------------
    public static function sortable(): array
    {
        return [
            'name',
            'email',
            'phone',
            'role_id',
            'created_at',
        ];
    }

    public static function relationSorts(): array
    {
        return [
            'role' => [
                ['table' => 'roles', 'local' => 'users.role_id', 'foreign' => 'roles.id'],
                'roles.name',
            ],
        ];
    }

    // -----------------------------------------

    public static function localFilters(): array
    {
        return [
            'name',
            'email',
            'phone',
            'role_id',
        ];
    }
    public static function foreignFilters(): array
    {
        return ['role_name' => fn($q, $v) => $q->whereHas('role', fn($q2) => $q2->where('name', 'like', "%$v%")),];
    }
}
