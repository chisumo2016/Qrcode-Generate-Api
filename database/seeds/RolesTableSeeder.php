<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [

            ['name' => 'admin', 'label' => 'Admin'],
            ['name' => 'moderator', 'label' => 'Moderator'],
            ['name' => 'webmaster', 'label' => 'Webmaster'],
            ['name' => 'buyers', 'label' => 'Buyers']
        ];

        foreach ($roles as $role)
        {
            Role::create($role);
        }
    }
}
