<?php

use Faker\Generator as Faker;

$withdraw_method  = array('bank','paypal','stripe','paystack');
$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'user_id'      =>  function(){
            return App\Models\User::all()->random();
        },
        
        'balance' => $faker->numberBetween(200, 400),
        'total_credit' => $faker->numberBetween(50, 4000),
        'total_debit' => $faker->numberBetween(0, 200),
        'withdraw_method' => $withdraw_method[rand(0,3)],
        'payment_email'  =>$faker->email,
        'bank_name'=>$faker->word,
        'bank_branch'=>$faker->state,
        'bank_account'=>$faker->bankAccountNumber,
        'applied_for_payout'=>$faker->numberBetween(0,1),
        'paid'=>$faker->numberBetween(0,1),
        'country'=>$faker->country,
        'other_details'=> $faker->paragraph(4)


    ];
});
