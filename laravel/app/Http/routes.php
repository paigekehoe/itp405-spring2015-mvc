<?php

use App\Models\Dvd;

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

Route::get('/', 'DvdsController@home');

Route::get('/home', 'DvdsController@home');

Route::get('/dvds/search', 'DvdsController@search');

Route::get('/dvds', 'DvdsController@results');

Route::post('/dvds/new', 'DvdsController@createReview');

Route::get('/dvds/create', 'DvdsController@create');

Route::post('/dvds', 'DvdsController@addNewDvd');

Route::get('/dvds/{id}', 'DvdsController@detailview');

Route::get('/eager-loading', function(){
    $dvds = Dvd::with('genre')->get();
    var_dump($dvds->toArray());
});

Route::get('/genres/{genre_name}/dvds', function($genre_name){
    $dvds = Dvd::with('genre')
        ->whereHas('genre', function($query) use ($genre_name) {
        $query->where('genre_name', '=', $genre_name);
    })
    ->get();

    return $dvds;
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
