<?php

namespace Database\Seeders;

use App\Models\User;
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

        $miscPerm = Permission::updateOrCreate(['name' => 'N/A']);
        // create permissions
        $userCreate = Permission::updateOrCreate(['name' => 'create users']);
        $userRead = Permission::updateOrCreate(['name' => 'read users']);
        $userUpdate = Permission::updateOrCreate(['name' => 'update users']);
        $userDelete = Permission::updateOrCreate(['name' => 'delete users']);

        $roleCreate = Permission::updateOrCreate(['name' => 'create roles']);
        $roleRead = Permission::updateOrCreate(['name' => 'read roles']);
        $roleUpdate = Permission::updateOrCreate(['name' => 'update roles']);
        $roleDelete = Permission::updateOrCreate(['name' => 'delete roles']);

        $permCreate = Permission::updateOrCreate(['name' => 'create permissions']);
        $permRead = Permission::updateOrCreate(['name' => 'read permissions']);
        $permUpdate = Permission::updateOrCreate(['name' => 'update permissions']);
        $permDelete = Permission::updateOrCreate(['name' => 'delete permissions']);

        $adminRead = Permission::updateOrCreate(['name' => 'read admin']);
        $adminUpdate = Permission::updateOrCreate(['name' => 'update admin']);

        // $userRole = Role::updateOrCreate(['name' => 'user'])->syncPermissions([
        //     $miscPerm
        // ]);

        $adminRole = Role::updateOrCreate(['name' => 'admin'])->syncPermissions([
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

        $superAdminRole = Role::updateOrCreate(['name' => 'super-admin'])->syncPermissions([
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

        User::updateOrCreate(
            [
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
            ],
            [
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        )->assignRole($superAdminRole);

        User::updateOrCreate(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
            ],
            [
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        )->assignRole($adminRole);
    }
}
