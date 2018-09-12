<?php

use Faker\Generator as Faker;

$factory->define(App\AccountHistory::class, function (Faker $faker) {
    return [
        'user_id'      =>  function(){
            return App\Models\User::all()->random();
        },

        'account_id'      =>  function(){
            return App\Models\User::all()->random();
        },

        'message'=> $faker->paragraph(2,true)

    ];
});


