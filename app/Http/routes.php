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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uppercase/{name}', function($name) {
	return "Hello, " . strtoupper($name);
});

Route::get('/increment/{number}', function($number){
	return "Your number $number plus 1 is equal to " . ($number + 1);
});

Route::get('/add/{num1}/{num2}', function($num1, $num2) {
	return "The sum of your numbers ($num1 & $num2) is equal to " . ($num1 + $num2);
});