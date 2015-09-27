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

Route::get('/overview', ['as' => 'overview', 'before' => 'auth', 'uses' => 'Overview\OverviewController@show']);

Route::get('/teams', ['as' => 'teams', 'before' => 'auth', 'uses' => 'Team\TeamController@listAll']);
Route::post('/teams/create', ['as' => 'createTeam', 'before' => 'auth', 'uses' => 'Team\TeamController@create']);
Route::get('/teams/.*/{teamId}', ['as' => 'viewTeam', 'before' => 'auth', 'uses' => 'Team\TeamController@viewTeam']);


Route::get('/people', ['as' => 'people', 'before' => 'auth', 'uses' => 'People\PeopleController@listAll']);
Route::get('/people/get/{id}', [
        'as' => 'people',
        'before' => 'auth',
        'uses' => 'People\PeopleController@get'
    ])
    ->where('id', '[0-9]+');

Route::post('/auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@authenticate']);
Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);


Route::filter('auth', function($request)
{
    if (Auth::guest()) return Redirect::to('welcome');
});
