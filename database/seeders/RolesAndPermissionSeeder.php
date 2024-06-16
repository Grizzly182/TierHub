<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view category']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'delete category']);

        Permission::create(['name' => 'view tierlist']);
        Permission::create(['name' => 'create tierlist']);
        Permission::create(['name' => 'update tierlist']);
        Permission::create(['name' => 'delete tierlist']);

        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'ban user']);

        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'assign role']);



        $admin = Role::create([
            'name' => 'Admin',
        ]);
        $admin->givePermissionTo(Permission::all());

        $user = Role::create([
            'name' => 'User',
        ]);
        $user->givePermissionTo(['view user', 'view category', 'view tierlist', 'create tierlist', 'update tierlist', 'delete tierlist']);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('admin'),
        ]);
        $user->assignRole('Admin');
    }
}
