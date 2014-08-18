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

Route::get('/','UserController@index');

Route::resource('users', 'UserController');

Route::post('users/{user_id}/expenses/{id}/update','UserExpenseController@update');

Route::resource('users.expenses', 'UserExpenseController');
