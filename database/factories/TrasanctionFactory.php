<?php

use Faker\Generator as Faker;
$status   = array('completed','initiated','failed');

$factory->define(App\Trasanction::class, function (Faker $faker) {

    return [
        'user_id'      =>  function(){
            return App\Models\User::all()->random();
        },

        'qrcode_owner_id'      =>  function(){
            return App\Models\User::all()->random();
        },

         'qrcode_id'      =>  function(){
        return App\Models\Qrcode::all()->random();
         },

         'payment_method'=> 'paystack/'.$faker->creditCardType,
         'message'=> $faker->paragraph(2,true),
         'amount' =>  $faker->numberBetween(200, 4000),
         'status '=>  $status[rand(0,2)],

    ];
});

