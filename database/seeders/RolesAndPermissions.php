<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $miscPerm = Permission::create(['name' => 'N/A']);
        // create permissions
        $userCreate = Permission::create(['name' => 'create users']);
        $userRead = Permission::create(['name' => 'read users']);
        $userUpdate = Permission::create(['name' => 'update users']);
        $userDelete = Permission::create(['name' => 'delete users']);

        $roleCreate = Permission::create(['name' => 'create roles']);
        $roleRead = Permission::create(['name' => 'read roles']);
        $roleUpdate = Permission::create(['name' => 'update roles']);
        $roleDelete = Permission::create(['name' => 'delete roles']);

        $permCreate = Permission::create(['name' => 'create permissions']);
        $permRead = Permission::create(['name' => 'read permissions']);
        $permUpdate = Permission::create(['name' => 'update permissions']);
        $permDelete = Permission::create(['name' => 'delete permissions']);

        $adminRead = Permission::create(['name' => 'read admin']);
        $adminUpdate = Permission::create(['name' => 'update admin']);

        // $userRole = Role::create(['name' => 'user'])->syncPermissions([
        //     $miscPerm
        // ]);

        $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userCreate,
            $userRead,
            $userUpdate,
            $userDelete,
            $roleCreate,
            $roleRead,
            $roleUpdate,
            $roleDelete,
            $permCreate,
            $permRead,
            $permUpdate,
            $permDelete,
            $adminRead,
            $adminUpdate,
        ]);

        $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            $userCreate,
            $userRead,
            $userUpdate,
            $userDelete,
            $roleCreate,
            $roleRead,
            $roleUpdate,
            $roleDelete,
            $permCreate,
            $permRead,
            $permUpdate,
            $permDelete,
            $adminRead,
            $adminUpdate,
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole($adminRole);
    }
}