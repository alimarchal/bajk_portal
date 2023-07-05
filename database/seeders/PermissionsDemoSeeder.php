<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);

        Permission::create(['name' => 'Create Circular']);
        Permission::create(['name' => 'Create Manuals']);
        Permission::create(['name' => 'Create HRD']);
        Permission::create(['name' => 'Create Downloads']);
        Permission::create(['name' => 'Create Notice Board']);
        Permission::create(['name' => 'Create Events']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit');
//        $role1->givePermissionTo('delete');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish');
        $role2->givePermissionTo('unpublish');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password' => \Hash::make('123456')
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'password' => \Hash::make('123456')
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'kh.marchal@gmail.com',
            'password' => \Hash::make('123456')
        ]);
        $user->assignRole($role3);
    }
}
