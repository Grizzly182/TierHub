<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModeratorRoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permission::create(['name' => 'approve templates']);

        $moderator = Role::create([
            'name' => 'Moderator',
        ]);

        $permissions = Permission::where('name', '!=', 'ban user')->get();
        $moderator->syncPermissions($permissions);

        $user = User::where('name', 'admin1')->first();
        $user->assignRole('Moderator');
    }
}
