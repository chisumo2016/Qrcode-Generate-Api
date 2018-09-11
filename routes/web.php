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

    Route::resource('qrcodes', 'QrcodeController')->except(['show']);


    Route::resource('trasanctions', 'TrasanctionController');


    Route::resource('users', 'UserController');

    Route::resource('accounts', 'AccountController')->except(['show']);

    Route::get('/accounts/show/{id?}' ,'AccountController@show')->name('accounts.show');

    Route::resource('accountHistories', 'AccountHistoryController');


    //Only Moderators and admin
    Route::group(['middleware' => 'moderator'], function () {

        Route::get('/users', 'UserController@index')->name('users.index');
    });

    //Only Admin
    Route::resource('roles', 'RoleController')->middleware('Admin');

   //Restrct url
    Route::post('/accounts/apply_for_payout', 'AccountController@apply_for_payout')->name('accounts.apply_for_payout');
    Route::post('/accounts/mark_as_paid', 'AccountController@mark_as_paid')->name('accounts.mark_as_paid')->middleware('moderator');

    Route::get('/accounts', 'AccountController@index')->name('accounts.index')->middleware('moderator');

    Route::get('/accounts/create', 'AccountController@index')->name('accounts.create')->middleware('Admin');


    Route::get('/accountHistories', 'AccountHistoryController@index')->name('accountHistories.index')->middleware('moderator');

    Route::get('/accountHistories/create', 'AccountHistoryController@index')->name('accountHistories.create')->middleware('Admin');
});

Route::get('/qrcodes/{id}','rcodeController@show')->name('qrcodes.show');


//Route::resource('accounts', 'AccountController');