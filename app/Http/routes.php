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
use \App\Post;

Route::get('/', 'HomeController@showWelcome');

Route::get('/sayhello/{firstName?}/{lastName?}', function($firstName = "John", $lastName = "Doe")
{
	if ($firstName == "Chris") {
		return Redirect::to('/');
	}

	$data = [
		'firstName' => $firstName,
		'lastName' => $lastName
	];
	return view('my-first-view', $data);
});

Route::get('/increment/{number?}', 'HomeController@increment');

Route::get('/uppercase/{name}', 'HomeController@uppercase');


Route::get('/add/{num1}/{num2}', function($num1, $num2) {
	return "The sum of your numbers ($num1 & $num2) is equal to " . ($num1 + $num2);
});

Route::get('/rolldice/{guess}', 'HomeController@rollDice');

//Route for posts page
Route::resource('posts', 'PostsController');

//Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Registrations routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');