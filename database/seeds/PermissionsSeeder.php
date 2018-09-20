<?php

use App\Models\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get first three roles
        $roles = Role::orderBy('id', 'asc')->take(1)->get();

        $permissions = [
            ['name' => 'view.roles',  'label' => 'View Roles'],
            ['name' => 'create.roles',  'label' => 'Create Roles'],
            ['name' => 'edit.roles',    'label' => 'Edit Roles'],
            ['name' => 'delete.roles',  'label' => 'Delete Roles'],
            ['name' => 'view.users',  'label' => 'View User'],
            ['name' => 'create.users',  'label' => 'Create User'],
            ['name' => 'edit.users',    'label' => 'Edit User'],
            ['name' => 'delete.users',  'label' => 'Delete User'],
            ['name' => 'view.accounts',     'label' => 'View Account'],
            ['name' => 'create.accounts',   'label' => 'Create Account'],
            ['name' => 'edit.accounts',     'label' => 'Edit Account'],
            ['name' => 'delete.account',    'label' => 'Delete Account'],
            ['name' => 'view.trasanctions',     'label' => 'View Trasanctions'],
            ['name' => 'create.trasanctions',   'label' => 'Create Trasanctions'],
            ['name' => 'edit.trasanctions',     'label' => 'Edit Trasanctions'],
            ['name' => 'delete.trasanctions',   'label' => 'Delete Trasanctions'],
            ['name' => 'view.account_histories',    'label' => 'View  AccountHistories'],
            ['name' => 'create.account_histories',  'label' => 'Create AccountHistories'],
            ['name' => 'edit.account_histories',    'label' => 'Edit AccountHistories'],
            ['name' => 'delete.account_histories',  'label' => 'Delete AccountHistories'],
            ['name' => 'view.qrcodes',      'label' => 'View Qrcodes'],
            ['name' => 'create.qrcodes',    'label' => 'Create Qrcodes'],
            ['name' => 'edit.qrcodes',      'label' => 'Edit Qrcodes'],
            ['name' => 'delete.qrcodes',    'label' => 'Delete Qrcodes'],
            ['name' => 'update.qrcodes',     'label' => 'Update Qrcodes'],
        ];

        //create all permissions
        foreach ($permissions as $permission)
        {
            Permission::create($permission);
        }

        //get all permissions
        $permi = Permission::pluck('id')->toArray();

        //assign all permissions to three roles.
        foreach($roles as $role) {
            $role->permissions()->attach($permi);
        }
    }
}


//            ['name' => 'manage', 'label' => 'Manage Section'],
//
//            ['name' => 'menu.section', 'label' => 'Menu Section'],

