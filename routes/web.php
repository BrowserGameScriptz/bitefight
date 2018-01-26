<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@getIndex')->middleware('guest');
Route::get('/news', 'Controller@getNews');
Route::get('/highscore', 'Controller@getHighscore');
Route::get('/ajax/register', 'HomeController@registerAjaxCheck');

Route::prefix('/profile')->group(function() {
	Route::get('/index', 'ProfileController@getIndex');
	Route::post('/training', 'ProfileController@postTrainingUpdate');
	Route::get('/logo', 'ProfileController@getLogo');
	Route::post('/logo', 'ProfileController@postLogo');
	Route::get('/select/race', 'ProfileController@getRaceSelect');
	Route::post('/select/race', 'ProfileController@postRaceSelect');
	Route::get('/talents', 'ProfileController@getTalents');
	Route::post('/talents', 'ProfileController@postTalentsForm');
	Route::post('/talents/use', 'ProfileController@postTalentsUse');
	Route::post('/talents/reset/single', 'ProfileController@postTalentResetSingle');
});

Route::get('/hideout', 'UserController@getHideout');
Route::post('/hideout', 'UserController@postHideout');

Route::prefix('/hunt')->group(function() {
	Route::get('/index', 'HuntController@getHunt');
	Route::get('/human/{huntId}', 'HuntController@postHumanHunt');
});

Route::get('/voodoo', 'CityController@getVoodoo');
Route::post('/voodoo', 'CityController@postVoodoo');

Route::get('/logout', function() {Auth::logout(); return redirect(url(''));});