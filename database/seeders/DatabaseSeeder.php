<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = Role::create([
            'name' => 'Super Admin'
        ]);

        $permission = Permission::create([
            'name' => 'all_permission'
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@atilimited.net',
            'password' => Hash::make('admin123456'),
        ]);


        // Attaching permission to role
        $role = Role::find($role->id);

        // Find the permission
        $permission = Permission::where('name', $permission->name)->first();

        // Attach the permission to the role if not already assigned
        if (!$role->permissions->contains($permission)) {
            $role->permissions()->attach($permission);
        }


        // Assigning role to Admin
        $user = User::find($admin->id);

        // Find the role
        $role = Role::where('name', $role->name)->first();

        // Assign the role to the user
        $user->assignRole($role);


        Role::create([
            'name' => 'General User'
        ]);

        Permission::create([
            'name' => 'user_permission'
        ]);
    }
}
