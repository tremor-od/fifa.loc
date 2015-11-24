<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('id', '[0-9]+');

Route::group(array('prefix' => 'admin'), function () {

    Route::any('/', 'AdminController@index');
    Route::any('/login', 'AuthController@login');
    Route::any('/page/{id?}', 'AdminController@page');
    Route::any('/pageAction/{action}/{id?}', 'AdminController@pageAction');

    Route::any('/transaction', 'AdminController@transaction');
    Route::any('/transactionType/{id?}', 'AdminController@transactionType');
    Route::any('/transactionTypeAction/{action}/{id?}', 'AdminController@transactionTypeAction');

    Route::any('/card/{id?}', 'AdminController@card');
    Route::any('/cardAction/{action}/{id?}', 'AdminController@cardAction');

    Route::any('/cardType/{id?}', 'AdminController@cardType');
    Route::any('/cardTypeAction/{action}/{id?}', 'AdminController@cardTypeAction');

    Route::any('/cardRole/{id?}', 'AdminController@cardRole');
    Route::any('/cardRoleAction/{action}/{id?}', 'AdminController@cardRoleAction');

    Route::any('/pack/{id?}', 'AdminController@pack');
    Route::any('/packAction/{action}/{id?}', 'AdminController@packAction');

    Route::any('/openedPacks/', 'AdminController@openedPacks');
    Route::any('/packStatistic/', 'AdminController@packStatistic');

    Route::any('/user/{id?}', 'AdminController@user');
    Route::any('/userTransactions/{id?}', 'AdminController@userTransactions');
    Route::any('/userOrders/{id?}', 'AdminController@userOrders');
    Route::any('/userAction/{action}/{id?}', 'AdminController@userAction');

    Route::any('/faq/{id?}', 'AdminController@faq');
    Route::any('/faqAction/{action}/{id?}', 'AdminController@faqAction');

    Route::any('/exchange', 'AdminController@exchange');
});

Route::group(array('prefix' => 'auth'), function () {

    Route::any('/login', 'AuthController@login');
    Route::any('/registration', 'AuthController@registration');
    Route::any('/logout', 'AuthController@logout');
    Route::any('/remind', 'RemindersController@getRemind');
    Route::any('/postRemind', 'RemindersController@postRemind');
    Route::any('/test', 'AuthController@test');

});
Route::any('/password/reset/{token}', 'RemindersController@getReset');
Route::any('/password/post', 'RemindersController@postReset');

Route::get('/', 'HomeController@index');
Route::any('/contacts', 'HomeController@contact');
Route::any('/faq', 'HomeController@faq');
Route::any('/myAccount', 'HomeController@myAccount');

Route::any('/deposit', 'DepositController@index');


Route::group(array('prefix' => 'cabinet'), function () {

    Route::any('/', 'CabinetController@index');
    Route::any('/editUser', 'CabinetController@editUser');
    Route::any('/order/{id}', 'CabinetController@order');
    Route::any('/withdraw', 'CabinetController@withdraw');

});

Route::group(array('prefix' => 'pack'), function () {

    Route::any('/buy/{id}', 'PackController@buy');
    Route::any('/opened/{id}', 'PackController@opened');


});
