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
Route::get('/teams/delete/{teamId}', ['as' => 'createTeam', 'before' => 'auth', 'uses' => 'Team\TeamController@delete']);
Route::post('/teams/addMember', ['as' => 'addMemberToTeam', 'before' => 'auth', 'uses' => 'Team\TeamController@addMember']);
Route::post('/teams/removeMember', ['as' => 'removeMemberFromTeam', 'before' => 'auth', 'uses' => 'Team\TeamController@removeMember']);
Route::get('/teams/{teamName}/{teamId}', ['as' => 'viewTeam', 'before' => 'auth', 'uses' => 'Team\TeamController@viewTeam']);

Route::post('/objective/getByEntity', [
    'as' => 'getObjectives',
    'before' => 'auth',
    'uses' => 'Objective\ObjectiveController@getByEntity'
]);

Route::get('/people', ['as' => 'people', 'before' => 'auth', 'uses' => 'People\PeopleController@listAll']);
Route::get('/people/get/{id}', [
        'as' => 'people',
        'before' => 'auth',
        'uses' => 'People\PeopleController@get'
    ])
    ->where('id', '[0-9]+');

Route::get('/my/okrs', ['as' => 'myOkrs', 'uses' => 'My\MyOkrsController@viewOkrs']);

Route::post('/auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@authenticate']);
Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);


Route::filter('auth', function($request)
{
    if (Auth::guest()) return Redirect::to('welcome');
});
