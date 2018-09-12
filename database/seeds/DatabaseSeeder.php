<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory('App\Models\User', 10)->create();
        factory('App\Models\Qrcode', 50)->create();
        factory('App\Models\Trasanction', 50)->create();
        factory('App\Models\Account', 50)->create();
    }
}
