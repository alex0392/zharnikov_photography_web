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

Route::get('/', ['uses'=>'HomeController@index']);

Route::get('/portfolio', ['uses'=>'HomeController@portfolio'],['as'=>'portfolio']);

Route::get('/portfolio/{type}/{albom?}', ['uses'=>'HomeController@alboms']);

Route::get('/about', 'HomeController@about');

Route::get('/contact', 'HomeController@contact');


Route::auth();

//Route::get('/home', 'HomeController@index');

Route::post('photo/{id?}','photoController@store');

Route::post('photo/{id?}/edit','photoController@edit');

Route::resource('albom', 'albomController');
Route::resource('photo', 'photoController');
//Route::resource('about', 'aboutController');
Route::put('/about', 'aboutController@update');
/* Admin controller */
Route::group(['prefix' => 'admin','middleware' => 'auth'], function()
{
    Route::get('/', ['uses'=>'adminController@index']);
    Route::get('/about', ['uses'=>'adminController@about']);
    Route::get('/profile', ['uses'=>'adminController@profile']);
    Route::get('/albom/new', ['uses'=>'adminController@newAlbom']);
    Route::get('/albom/{id?}', ['uses'=>'adminController@albom'])->where('id', '[0-9]+');
	Route::get('/albom/{id?}/addPhoto', ['uses'=>'adminController@addPhoto'])->where('id', '[0-9]+');

});