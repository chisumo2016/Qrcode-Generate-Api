<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// only logged in users can view the below

Route::group(['middleware' => 'auth'], function () {

    Route::resource('qrcodes', 'QrcodeController');


    Route::resource('trasanctions', 'TrasanctionController');


    Route::resource('users', 'UserController');

    Route::resource('accounts', 'AccountController');

    Route::resource('accountHistories', 'AccountHistoryController');


    //Only Moderators and admin
    Route::group(['middleware' => 'moderator'], function () {

        Route::get('/users', 'UserController@index')->name('users.index');
    });

    //Only Admin
    Route::resource('roles', 'RoleController')->middleware('Admin');

    Route::post('/accounts/apply_for_payout', 'AccounsController@apply_for_payout')->name('accounts.apply_for_payout');
    Route::post('/accounts/mark_as_paid', 'AccounsController@mark_as_paid')->name('accounts.mark_as_paid');
});




//Route::resource('accounts', 'AccountController');