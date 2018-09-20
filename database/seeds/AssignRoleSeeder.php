<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1)->first();
        $role = Role::findOrFail(1)->first();

        return $user->roles()->attach($role);
    }
}
