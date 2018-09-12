<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Account::class, function (Faker $faker) {

    $withdraw_method  = array('bank','paypal','stripe','paystack');
    $users = App\Models\User::pluck('id'); // generate array
    //$users = App\Models\User::all()->random(); // generate object
    return [
        'user_id'=>$faker->unique()->randomElement($users),
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
