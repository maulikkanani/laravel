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

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('nerds', 'NerdController');
Route::controller('users','UsersController');

Route::get('test', function()
{
	return View::make('index');
});

Route::controller('Contact','ContactController');   
// route to show the login form
Route::get('/', array('uses' => 'HomeController@showLogin'));

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the login
Route::post('login', array('uses' => 'HomeController@doLogin'));

// route to LogOut the form
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('register', array('uses' => 'HomeController@showRegister'));

Route::post('create', array('uses' => 'HomeController@doRegister'));

Route::get('sticky', 'StickyController@index');

Route::post('add', 'StickyController@addnew');

Route::post("sticky/remove", 'StickyController@destroy');

Route::post("sticky/update", 'StickyController@edit');

Route::post("sticky/scroll", 'StickyController@show');

Route::resource('setting', 'settingController');