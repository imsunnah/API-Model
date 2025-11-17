<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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



    // Defined relationship with role and permission
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Assign a role to the user
    public function assignRole($role)
    {
        if (is_string($role)) {
            
            $role = Role::where('name', $role)->first();
        }

        if ($role) {
            $this->roles()->attach($role);
        }
    }

    // revoke a role from the user
    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        if ($role) {
            $this->roles()->detach($role);
        }
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Assign a permission to the user
    public function assignPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if ($permission) {
            $this->permissions()->attach($permission);
        }
    }


    public function hasPermissionTo($permission)
    {
        // Check if the user has the permission directly
        // var_dump('hello');exit;
        if ($this->permissions->contains('name', $permission)) {
            
            return true;
        }

        // Check if the user has the permission through roles
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permission)) {
                return true;
            }
        }

        return false;
    }
}
