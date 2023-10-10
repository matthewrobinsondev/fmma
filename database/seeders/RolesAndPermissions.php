<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        // Reset cached roles and permissions
        //        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'can_access_admin_panel']);
        Permission::create(['name' => 'read_only_users']);
        Permission::create(['name' => 'edit_users']);

        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('can_access_admin_panel');
        $admin->givePermissionTo('read_only_users');
        $admin->givePermissionTo('edit_users');

        $role2 = Role::create(['name' => 'user']);

        $adminUser = User::factory()->create([
            'id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('root'),
        ]);

        $adminUser->assignRole($admin);

        $user = User::factory()->create([
            'id' => 2,
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password' => Hash::make('root'),
        ]);

        $user->assignRole($role2);
    }
}
