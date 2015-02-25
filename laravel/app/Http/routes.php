<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DvdsController@search');

Route::get('home', 'HomeController@index');

Route::get('/dvds/search', 'DvdsController@search');

Route::get('/dvds', 'DvdsController@results');

Route::get('dvds/new', 'DvdsController@create');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);