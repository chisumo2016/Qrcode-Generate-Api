<?php

use Faker\Generator as Faker;

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
         'amount'=>  $faker->numberBetween(300, 4000),
         'status'=>  'completed',

    ];
});

