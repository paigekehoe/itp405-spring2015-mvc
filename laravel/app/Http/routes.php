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
        ->join('ratings', 'ratings.id','=','dvds.rating_id')
        ->join('labels', 'labels.id','=','dvds.label_id')
        ->whereHas('genre', function($query) use ($genre_name) {
        $query
            ->where('genre_name', '=', $genre_name);
    })
    ->get();
    $genres = DB::table('genres')->get();
    $ratings = DB::table('ratings')->get();
    $labels = DB::table('labels')->get();

    //return($dvds);
    return view('genres', ['genre_name'=>$genre_name, 'dvds'=>$dvds, 'genres'=>$genres, 'ratings'=>$ratings, 'labels'=>$labels]);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('review', function(){
//    $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=72m6x95wpv6wvdzcwt6amc3r&q="+$movieTitle
//    $jsonString = file_get_contents($url);
//    $rawData = json_decode($jsonString);
//});
//
//http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=72m6x95wpv6wvdzcwt6amc3r&q=die+hard
