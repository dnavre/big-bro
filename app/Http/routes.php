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

Route::get('/welcome', array('as' => 'welcome', function () {
    return view('welcome');
}));

Route::get('/overview', array('as' => 'overview', 'before' => 'auth', function () {
    return view('overview');
}));

Route::get('/teams', ['as' => 'teams', 'before' => 'auth', 'uses' => 'Team\TeamConteoller@listAll']);

Route::post('/auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@authenticate']);
Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);


Route::filter('auth', function($request)
{
    if (Auth::guest()) return Redirect::to('welcome');
});
